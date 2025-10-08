<?php

namespace Database\Seeders;

use Carbon\Carbon;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use App\Models\OrderDetail;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        // 🧍 Create Users
        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'no_hp' => '081234567890',
            'ktp_image' => 'ktp_images/ktp.jpg',
            'role' => 'admin',
            'email_verified_at' => now(),
        ]);

        $users = collect();
        foreach (range(1, 5) as $i) {
            $users->push(
                User::create([
                    'name' => "User $i",
                    'email' => "user$i@example.com",
                    'password' => Hash::make('password'),
                    'no_hp' => '0812345678' . $i,
                    'ktp_image' => 'ktp_images/ktp.jpg',
                    'role' => 'user',
                    'email_verified_at' => now(),
                ]),
            );
        }

        // 🏕️ Create Categories
        $categories = collect(['Tents', 'Backpacks', 'Cooking Gear', 'Clothing', 'Lighting'])->map(
            fn($cat) => Category::create(['category' => $cat]),
        );

        // 🎒 Create Products
        $products = collect();
        foreach ($categories as $category) {
            foreach (range(1, 4) as $i) {
                $products->push(
                    Product::create([
                        'category_id' => $category->id,
                        'name' => "{$category->category} Item $i",
                        'description' => "Durable and reliable {$category->category} item for mountain use.",
                        'price' => rand(50000, 150000),
                        'stock' => rand(5, 20),
                        'condition' => 'Good',
                        'image' => 'products/product.jpg',
                    ]),
                );
            }
        }

        // 🚚 Order Status Variations
        $statuses = ['pending', 'confirmed', 'on_rent', 'cancelled', 'completed'];

        foreach ($statuses as $index => $status) {
            $user = $users->random();
            $loanDate = Carbon::now()->subDays(rand(1, 10));
            $duration = rand(2, 5);
            $returnDate = (clone $loanDate)->addDays($duration);

            $order = Order::create([
                'user_id' => $user->id,
                'loan_date' => $loanDate,
                'return_date' => $returnDate,
                'duration' => $duration,
                'total_price' => 0, // will update later
                'total_fine' => $status === 'Returned' ? rand(0, 20000) : 0,
                'additional_fine' => $status === 'Returned' ? rand(0, 10000) : 0,
                'status' => $status,
                'note' => fake()->sentence(),
            ]);

            // 🧾 Add random order details
            $detailsCount = rand(1, 3);
            $total = 0;
            foreach (range(1, $detailsCount) as $j) {
                $product = $products->random();
                $qty = rand(1, 3);
                $unitPrice = $product->price;
                $subtotal = $qty * $unitPrice;
                $total += $subtotal;

                OrderDetail::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'quantity' => $qty,
                    'unit_price' => $unitPrice,
                    'subtotal' => $subtotal,
                ]);
            }

            $order->update(['total_price' => $total]);
        }

        // ⚠️ Create an Overdue case (computed, not stored)
        $overdueUser = $users->random();
        $loanDate = Carbon::now()->subDays(10);
        $duration = 3; // Due 7 days ago
        $returnDate = (clone $loanDate)->addDays($duration);

        $overdueOrder = Order::create([
            'user_id' => $overdueUser->id,
            'loan_date' => $loanDate,
            'return_date' => $returnDate,
            'duration' => $duration,
            'total_price' => 0,
            'total_fine' => 0,
            'additional_fine' => 0,
            'status' => 'on_rent', // still active, will show as Overdue dynamically
            'note' => 'Customer has not returned items yet.',
        ]);

        $product = $products->random();
        $qty = 2;
        $unitPrice = $product->price;
        $subtotal = $qty * $unitPrice;

        OrderDetail::create([
            'order_id' => $overdueOrder->id,
            'product_id' => $product->id,
            'quantity' => $qty,
            'unit_price' => $unitPrice,
            'subtotal' => $subtotal,
        ]);

        $overdueOrder->update(['total_price' => $subtotal]);

        echo "✅ Database seeded successfully with all order status variations.\n";
    }
}

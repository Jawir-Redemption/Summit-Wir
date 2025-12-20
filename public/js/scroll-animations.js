/**
 * Scroll-Triggered Animations
 * Animasi baru jalan saat element terlihat di viewport
 * Menggunakan Intersection Observer API
 */

document.addEventListener('DOMContentLoaded', function () {
    // Konfigurasi Intersection Observer
    const observerOptions = {
        root: null, // Viewport sebagai root
        rootMargin: '0px 0px -100px 0px', // Trigger saat element 100px dari bawah viewport
        threshold: 0.1, // Trigger saat 10% element terlihat
    };

    // Callback function saat element terlihat
    const observerCallback = (entries, observer) => {
        entries.forEach((entry) => {
            // Jika element terlihat di viewport
            if (entry.isIntersecting) {
                // Tambah class 'animate' untuk trigger animasi
                entry.target.classList.add('animate');

                // Optional: Stop observing setelah animasi (animasi cuma jalan 1x)
                // Hapus baris ini jika mau animasi repeat saat scroll up-down
                observer.unobserve(entry.target);
            }
        });
    };

    // Buat Intersection Observer instance
    const observer = new IntersectionObserver(observerCallback, observerOptions);

    // Ambil semua element dengan class 'scroll-animate'
    const animatedElements = document.querySelectorAll('.scroll-animate');

    // Observe setiap element
    animatedElements.forEach((element) => {
        observer.observe(element);
    });

    // Log untuk debugging
    console.log(`🎬 Scroll Animations initialized: ${animatedElements.length} elements`);
});

/**
 * Alternative: Simple function untuk manual trigger
 * Bisa dipanggil dari tempat lain jika perlu
 */
function triggerScrollAnimations() {
    const elements = document.querySelectorAll('.scroll-animate:not(.animate)');
    elements.forEach((el) => {
        const rect = el.getBoundingClientRect();
        const windowHeight = window.innerHeight;

        if (rect.top < windowHeight - 100) {
            el.classList.add('animate');
        }
    });
}

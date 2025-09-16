// Animasi Profile
window.addEventListener("scroll", () => {
    const profile = document.querySelector(".profile");
    const homeSection = document.querySelector("#home"); // pastikan ada id="home"

    if (!profile || !homeSection) return;

    const homeTop = homeSection.getBoundingClientRect().top;

    if (window.scrollY > 50 && homeTop < -100) {
        // Scroll jauh dari home → kecilkan
        profile.classList.add("shrink");
    } else {
        // Di posisi home → besarkan kembali
        profile.classList.remove("shrink");
    }
});

//Swipper
var swiper = new Swiper(".home", {
    spaceBetween: 30,
    centeredSlides: true,

    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});

let menu = document.querySelector("#menu-icon");
let navbar = document.querySelector(".navbar");

menu.onclick = () => {
    menu.classList.toggle("bx-x");
    navbar.classList.toggle("active");
};

window.onscroll = () => {
    menu.classList.remove("bx-x");
    navbar.classList.remove("active");
};

// Slider Otomatis

var swiper = new Swiper(".swiper", {
    loop: true,
    autoplay: {
        delay: 8000,
        disableOnInteraction: false,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
});

// Animasi katalog
const boxes = document.querySelectorAll(
    ".box, .map, .about, .swiper-image, .swiper-animate, .vision-mission"
);

const observer = new IntersectionObserver(
    (entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add("animate");
            } else {
                entry.target.classList.remove("animate"); // agar bisa animasi ulang saat scroll ke atas
            }
        });
    },
    {
        threshold: 0.4,
    }
);

boxes.forEach((box) => {
    observer.observe(box);
});

// Learn More
function toggleText() {
    let moreText = document.querySelector(".more-text");
    let button = document.querySelector(".btn");

    if (moreText.style.maxHeight === "0px" || moreText.style.maxHeight === "") {
        moreText.style.maxHeight = moreText.scrollHeight + "px";
        moreText.style.opacity = "1";
        button.textContent = "Show Less";
    } else {
        moreText.style.maxHeight = "0px";
        moreText.style.opacity = "0";
        button.textContent = "Learn More";
    }
}
// Loading screen
window.onload = function () {
    setTimeout(() => {
        document.querySelector(".loading-screen").classList.add("fade-out");
    }, 500); // Setelah 0.6 detik, loading screen mulai menghilang
};

// Pop Up
function openModal() {
    document.getElementById("productModal").style.display = "block";
}

function closeModal() {
    document.getElementById("productModal").style.display = "none";
}

window.onclick = function (event) {
    const modal = document.getElementById("productModal");
    if (event.target == modal) {
        modal.style.display = "none";
    }
};

// Angle-up
window.addEventListener("scroll", function () {
    let backToTop = document.querySelector(".footer-iconTop");
    if (window.scrollY > 300) {
        backToTop.classList.add("show");
    } else {
        backToTop.classList.remove("show");
    }
});

// Animasi Icon top
let lastScrollTop = 0;
const iconTop = document.querySelector(".footer-iconTop");

window.addEventListener("scroll", function () {
    const scrollTop = window.pageYOffset || document.documentElement.scrollTop;

    if (scrollTop > lastScrollTop) {
        // Scroll ke bawah - tampilkan icon
        iconTop.classList.add("show");
        iconTop.classList.remove("hide");
    } else {
        // Scroll ke atas - sembunyikan icon
        iconTop.classList.add("hide");
        iconTop.classList.remove("show");
    }

    lastScrollTop = scrollTop <= 0 ? 0 : scrollTop; // Menghindari nilai negatif
});

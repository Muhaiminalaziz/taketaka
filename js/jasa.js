// Pop Up
function openModal(productName, imageUrl, description) {
    document.getElementById("productModal").style.display = "block";
    document.getElementById("modalImage").src = imageUrl;
    document.querySelector(
        ".underline-heading"
    ).innerHTML = `<span class="underline">${
        productName.split(" ")[0]
    }</span> ${productName.split(" ").slice(1).join(" ")}`;
    document.querySelector(".product-description").innerHTML = description;
}

function closeModal() {
    document.getElementById("productModal").style.display = "none";
}

//Animasi katalog
const boxes = document.querySelectorAll(".box");

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
        threshold: 0.1,
    }
);
boxes.forEach((box) => {
    observer.observe(box);
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

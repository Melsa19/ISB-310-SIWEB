const modal = document.getElementById("colorModal");
const bgBox = document.getElementById("bgBox");
const textBox = document.getElementById("textBox");
const colorGrid = document.getElementById("colorGrid");
const selectBtn = document.getElementById("selectBtn");
const cancelBtn = document.getElementById("cancelBtn");
const saveBtn = document.getElementById("saveBtn");

let currentTarget = null;
let selectedColor = null;
let bgColor = null;
let textColor = null;

// Daftar warna
const colors = [
    "#ff0000", "#00ff00", "#0000ff",
    "#ffff00", "#ff00ff", "#00ffff",
    "#ffffff", "#000000", "#ffa500",
    "#800080", "#008000", "#808080"
];

// Generate warna di modal
colors.forEach(color => {
    const div = document.createElement("div");
    div.classList.add("color-option");
    div.style.backgroundColor = color;

    div.addEventListener("click", () => {
        document.querySelectorAll(".color-option").forEach(c => c.classList.remove("selected"));
        div.classList.add("selected");
        selectedColor = color;
    });

    colorGrid.appendChild(div);
});

// Klik kotak background
bgBox.addEventListener("click", () => {
    currentTarget = "background";
    modal.style.display = "flex";
});

// Klik kotak teks
textBox.addEventListener("click", () => {
    currentTarget = "text";
    modal.style.display = "flex";
});

// Cancel
cancelBtn.addEventListener("click", () => {
    modal.style.display = "none";
});

// Select
selectBtn.addEventListener("click", () => {
    if (!selectedColor) return;

    if (currentTarget === "background") {
        bgColor = selectedColor;
        bgBox.style.backgroundColor = selectedColor;
    } else {
        textColor = selectedColor;
        textBox.style.backgroundColor = selectedColor;
    }

    modal.style.display = "none";
});

// Simpan perubahan ke halaman
saveBtn.addEventListener("click", () => {
    if (bgColor) document.body.style.backgroundColor = bgColor;
    if (textColor) document.getElementById("judul").style.color = textColor;
});
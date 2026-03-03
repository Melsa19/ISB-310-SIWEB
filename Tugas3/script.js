// Ambil elemen
const bgBox = document.getElementById('bgBox');
const textBox = document.getElementById('textBox');
const simpanBtn = document.getElementById('simpanBtn');
const modal = document.getElementById('modalWarna');
const previewWarna = document.getElementById('previewWarna');
const colorPicker = document.getElementById('colorPicker');
const batalBtn = document.getElementById('batalBtn');
const pilihBtn = document.getElementById('pilihBtn');

// Variabel untuk menyimpan sementara
let sedangMengubah = ''; // 'bg' atau 'text'
let warnaSementara = '#ffffff';

// Fungsi buka modal
function bukaModal(jenis) {
    sedangMengubah = jenis;
    modal.style.display = 'flex';
    
    // Set preview sesuai warna yang dipilih
    if (jenis === 'bg') {
        warnaSementara = rgbToHex(bgBox.style.backgroundColor || '#ffffff');
    } else {
        warnaSementara = rgbToHex(textBox.style.backgroundColor || '#000000');
    }
    
    previewWarna.style.backgroundColor = warnaSementara;
    colorPicker.value = warnaSementara;
}

// Fungsi rgb ke hex
function rgbToHex(rgb) {
    if (rgb.startsWith('#')) return rgb;
    
    const match = rgb.match(/\d+/g);
    if (!match) return '#ffffff';
    
    const r = parseInt(match[0]).toString(16).padStart(2, '0');
    const g = parseInt(match[1]).toString(16).padStart(2, '0');
    const b = parseInt(match[2]).toString(16).padStart(2, '0');
    
    return '#' + r + g + b;
}

// Event klik pada kotak warna
bgBox.onclick = function() {
    bukaModal('bg');
};

textBox.onclick = function() {
    bukaModal('text');
};

// Event saat pilih warna
colorPicker.oninput = function(e) {
    warnaSementara = e.target.value;
    previewWarna.style.backgroundColor = warnaSementara;
};

// Tombol batal
batalBtn.onclick = function() {
    modal.style.display = 'none';
};

// Tombol pilih
pilihBtn.onclick = function() {
    if (sedangMengubah === 'bg') {
        bgBox.style.backgroundColor = warnaSementara;
    } else if (sedangMengubah === 'text') {
        textBox.style.backgroundColor = warnaSementara;
    }
    modal.style.display = 'none';
};

// Tombol simpan
simpanBtn.onclick = function() {
    const bgWarna = bgBox.style.backgroundColor || '#ffffff';
    const textWarna = textBox.style.backgroundColor || '#000000';
    
    document.body.style.backgroundColor = bgWarna;
    document.body.style.color = textWarna;
};

// Klik di luar modal
window.onclick = function(e) {
    if (e.target === modal) {
        modal.style.display = 'none';
    }
};

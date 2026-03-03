window.onload = function () {
    let jumlah = localStorage.getItem("counter");

    if (jumlah) {
        document.getElementById("hasil").innerHTML =
            "You have clicked the button " + jumlah + " time(s).";
    }
};

function hitungKlik() {
    let jumlah = localStorage.getItem("counter");

    if (jumlah) {
        jumlah = Number(jumlah) + 1;
    } else {
        jumlah = 1;
    }

    localStorage.setItem("counter", jumlah);

    document.getElementById("hasil").innerHTML =
        "You have clicked the button " + jumlah + " time(s).";
}
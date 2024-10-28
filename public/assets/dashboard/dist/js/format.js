const inputRupiah = document.getElementById("rupiahInput");

inputRupiah.addEventListener("input", function (e) {
    let value = e.target.value.replace(/[^,\d]/g, "");
    if (!isNaN(value) && value !== "") {
        e.target.value = "Rp " + parseFloat(value).toLocaleString("id-ID");
    } else {
        e.target.value = "Rp ";
    }
});

const inputNumber = document.getElementById("numberInput");

inputNumber.addEventListener("input", function (e) {
    let value = e.target.value.replace(/,/g, "");
    if (!isNaN(value) && value !== "") {
        e.target.value = parseFloat(value).toLocaleString("en-US");
    } else {
        e.target.value = "";
    }
});

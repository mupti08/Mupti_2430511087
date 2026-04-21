const dataLayanan = [
  { id: 1, nama: "Pembersihan Debu & Ganti Pasta", harga: "Rp 150.000" },
  { id: 2, nama: "Install Ulang Windows", harga: "Rp 100.000" },
  { id: 3, nama: "Ganti Baterai / Keyboard", harga: "Mulai Rp 50.000" },
  { id: 4, nama: "Pengecekan Mati Total", harga: "Gratis Cek" },
];

const tbodyTabel = document.querySelector("#isiTabel");
const bookingForm = document.querySelector("#bookingForm");
const pesanNotifikasi = document.querySelector("#pesanNotifikasi");

const tampilkanTabelHarga = () => {
  let barisHTML = "";
  for (let i = 0; i < dataLayanan.length; i++) {
    barisHTML += `
            <tr>
                <td>${dataLayanan[i].id}</td>
                <td>${dataLayanan[i].nama}</td>
                <td>${dataLayanan[i].harga}</td>
            </tr>
        `;
  }
  tbodyTabel.innerHTML = barisHTML;
};

tampilkanTabelHarga();

bookingForm.addEventListener("submit", (event) => {
  event.preventDefault(); // Mencegah halaman refresh

  const nama = document.querySelector("#nama").value;
  const tanggal = document.querySelector("#tanggal").value;
  const alamat = document.querySelector("#alamat").value;
  const kerusakan = document.querySelector("#kerusakan").value;

  if (kerusakan.length < 5) {
    alert("Deskripsi kerusakan terlalu singkat. Mohon jelaskan lebih detail.");
  } else if (alamat.length < 10) {
    alert("Mohon masukkan alamat penjemputan yang lebih lengkap.");
  } else {
    pesanNotifikasi.innerHTML = `
        <strong>Booking Berhasil!</strong><br><br>
        Halo <b>${nama}</b>, teknisi FixLapBot id akan menjemput laptop Anda pada tanggal <b>${tanggal}</b>.<br><br>
        📍 <b>Lokasi Penjemputan & Pengantaran:</b><br>
        ${alamat}
    `;

    pesanNotifikasi.style.display = "block";
    pesanNotifikasi.style.backgroundColor = "#d4edda";
    pesanNotifikasi.style.color = "#155724";
    pesanNotifikasi.style.padding = "20px";
    pesanNotifikasi.style.marginTop = "20px";
    pesanNotifikasi.style.borderRadius = "8px";
    pesanNotifikasi.style.border = "1px solid #c3e6cb";
    pesanNotifikasi.style.lineHeight = "1.5";

    bookingForm.reset();
    pesanNotifikasi.scrollIntoView({ behavior: "smooth" });
  }
});

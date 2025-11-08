// detail.js

document.addEventListener("DOMContentLoaded", () => {
  const destinasiData = {
    rinjani: {
      nama: "Gunung Rinjani",
      lokasi: "Lombok, Nusa Tenggara Barat",
      img: "assets/img/Rinjani.png",
      deskripsi:
        "Gunung Rinjani adalah salah satu gunung berapi tertinggi di Indonesia, terkenal dengan pemandangan Danau Segara Anak di puncaknya. Para pendaki dari seluruh dunia datang untuk menikmati panorama sunrise dan keindahan alam sekitarnya yang menakjubkan. Tempat ini juga memiliki nilai spiritual dan budaya yang kuat bagi masyarakat Sasak Lombok."
    },
    bromo: {
      nama: "Gunung Bromo",
      lokasi: "Probolinggo, Jawa Timur",
      img: "assets/img/bromo.png",
      deskripsi:
        "Gunung Bromo menyajikan pemandangan kawah aktif dengan hamparan lautan pasir yang luas. Sunrise di Bukit Penanjakan menjadi daya tarik utama bagi wisatawan. Dikelilingi oleh budaya Suku Tengger yang unik, Bromo adalah simbol keindahan alam dan kekayaan budaya Jawa Timur yang tak lekang oleh waktu."
    },
    komodo: {
      nama: "Pulau Komodo",
      lokasi: "Nusa Tenggara Timur",
      img: "assets/img/komodo.png",
      deskripsi:
        "Pulau Komodo adalah rumah bagi hewan purba langka, Komodo, satu-satunya di dunia. Taman Nasional Komodo menawarkan keindahan pantai, bukit savana, serta perairan yang jernih untuk snorkeling dan diving. Kombinasi antara petualangan dan keindahan alam membuatnya menjadi destinasi kelas dunia."
    },
    toraja: {
      nama: "Tana Toraja",
      lokasi: "Sulawesi Selatan",
      img: "assets/img/toraja.png",
      deskripsi:
        "Tana Toraja dikenal dengan tradisi pemakaman dan rumah adat Tongkonan yang megah. Keunikan budaya serta panorama alam pegunungan yang menawan menjadikannya salah satu destinasi wisata budaya paling menarik di Indonesia. Setiap kunjungan membawa pengalaman spiritual dan sejarah yang mendalam."
    },
    rajaampat: {
      nama: "Raja Ampat",
      lokasi: "Papua Barat",
      img: "assets/img/raja empat.png",
      deskripsi:
        "Raja Ampat adalah surga bagi penyelam dengan keindahan bawah laut yang tak tertandingi. Terumbu karangnya menampung ribuan spesies ikan dan biota laut lainnya. Selain menyelam, wisatawan dapat menikmati keindahan pulau-pulau karst yang tersebar seperti permata di laut biru jernih."
    },
    bali: {
      nama: "Pulau Bali",
      lokasi: "Bali",
      img: "assets/img/bali.png",
      deskripsi:
        "Pulau Bali dikenal dengan pantai yang indah, pura megah, serta budaya yang mempesona. Ubud, Kuta, dan Uluwatu menjadi beberapa destinasi populer. Bali menggabungkan harmoni antara alam, budaya, dan spiritualitas, menjadikannya ikon pariwisata Indonesia yang dicintai dunia."
    },
    belitung: {
      nama: "Pulau Belitung",
      lokasi: "Kepulauan Bangka Belitung",
      img: "assets/img/belitung.png",
      deskripsi:
        "Pulau Belitung terkenal dengan pantai berpasir putih, batu granit raksasa, dan air laut biru jernih. Tempat ini juga dikenal lewat film 'Laskar Pelangi' yang menampilkan keindahan alam dan keramahan warganya. Belitung adalah destinasi sempurna untuk relaksasi dan eksplorasi pantai eksotis."
    },
    labuanbajo: {
      nama: "Labuan Bajo",
      lokasi: "Flores, Nusa Tenggara Timur",
      img: "assets/img/labuan bajo.png",
      deskripsi:
        "Labuan Bajo adalah gerbang menuju keajaiban alam Pulau Flores dan Taman Nasional Komodo. Dengan pemandangan laut biru, pulau eksotis, serta spot diving terbaik di dunia, Labuan Bajo menjadi destinasi yang wajib dikunjungi bagi pencinta laut dan petualangan."
    },
  };

  const params = new URLSearchParams(window.location.search);
  const key = params.get("destinasi");
  const data = destinasiData[key];

  if (data) {
    document.getElementById("destinasi-nama").innerText = data.nama;
    document.getElementById("destinasi-lokasi").innerText = data.lokasi;
    document.getElementById("destinasi-img").src = data.img;
    document.getElementById("destinasi-deskripsi").innerText = data.deskripsi;
  }

  // Tombol Cek Cuaca (simulasi)
  document.getElementById("cekCuaca").addEventListener("click", () => {
    const kondisi = ["Cerah", "Hujan Ringan", "Berawan", "Hujan Lebat"];
    const suhu = Math.floor(Math.random() * (33 - 20 + 1)) + 20;
    const cuaca = kondisi[Math.floor(Math.random() * kondisi.length)];
    document.getElementById("hasilCuaca").innerText = `🌤️ Cuaca saat ini: ${cuaca}, suhu sekitar ${suhu}°C`;
  });

  // Kalkulator Estimasi Biaya
  document.getElementById("hitungBiaya").addEventListener("click", () => {
    const jarak = parseFloat(document.getElementById("jarak").value);
    const transportasi = document.getElementById("transportasi").value;
    const hasil = document.getElementById("hasilBiaya");

    if (isNaN(jarak) || jarak <= 0) {
      hasil.innerText = "⚠️ Masukkan jarak yang valid!";
      return;
    }

    let biayaPerKm = 0;
    switch (transportasi) {
      case "mobil": biayaPerKm = 2500; break;
      case "motor": biayaPerKm = 1500; break;
      case "bus": biayaPerKm = 1000; break;
    }

    const total = jarak * biayaPerKm;
    hasil.innerText = `💰 Estimasi biaya perjalanan: Rp ${total.toLocaleString("id-ID")}`;
  });
});

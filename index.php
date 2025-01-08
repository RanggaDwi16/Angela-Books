<?php
include 'includes/header.php';
include 'koneksi.php'; 
?>

<main class="py-3">
    <div class="container">
        <!-- Premium Banner -->
        <div class="alert d-flex justify-content-between align-items-center p-3" role="alert" style="background-color: #d4fdd0; border-radius: 20px; border: 2px solid #bdecb6;">
            <div class="d-flex align-items-center">
                <img src="assets/images/checkMark.png" alt="Check Mark" style="width: 50px; height: 50px; margin-right: 20px;">
                <div>
                    <strong>Buka Premium</strong>
                    <p class="mb-0" style="font-size: 0.9rem;">untuk mengakses semua buku</p>
                </div>
            </div>
            <a href="#" class="text-dark text-decoration-none" style="font-size: 0.9rem; font-weight: 500;">Pelajari Lebih >></a>
        </div>

        <!-- Hero Section -->
        <div class="text-center mb-5">
            <h1 class="fw-normal" style="font-size: 48px; font-family: 'Poppins', sans-serif; margin-bottom: 0.5rem; margin-top: 5rem;">
                Akses <span style="background: linear-gradient(90deg, #DC21B3, #7EAAEB); -webkit-background-clip: text; -webkit-text-fill-color: transparent; font-weight: 700;">Ilmu dan Imajinasi</span>
            </h1>
            <h2 class="fw-normal" style="font-size: 48px; margin-top: 0.5rem; font-family: 'Poppins', sans-serif;">Tanpa Batas.</h2>
            <p class="fw-normal" style="font-size: 1rem; margin-top: 1rem; font-family: 'Poppins', sans-serif; font-weight: 400;">
                Temukan inspirasi di antara ribuan judul buku. Mari mulai menjelajahi dunia literatur bersama kami!
            </p>

            <!-- Search Form -->
            <div class="position-relative" style="max-width: 400px; margin: 0 auto;">
                <div class="input-group" style="border-radius: 30px; overflow: hidden; border: 1px solid #757575;">
                    <input type="text" id="searchInput" class="form-control border-0" placeholder="Cari judul buku, penulis, atau topik." aria-label="Search" style="border-radius: 0; height: 50px; padding-left: 20px;">
                    <button class="btn btn-light border-0" style="height: 50px; width: 50px; display: flex; align-items: center; justify-content: center;">
                        <img src="assets/images/search.png" alt="Search" style="width: 15px; height: 15px;">
                    </button>
                </div>
                <!-- Dropdown hasil pencarian -->
                <ul id="searchResults" class="dropdown-menu w-100" style="position: absolute; top: 100%; left: 0; z-index: 1000; display: none; max-height: 200px; overflow-y: auto;">
                    <!-- Hasil pencarian akan dimasukkan di sini -->
                </ul>
            </div>
        </div>

        <!-- Book Section -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <!-- Judul -->
            <h2 class="mb-0" style="font-family: 'Poppins', sans-serif; font-size: 24px;">Cari Buku yang Anda Inginkan</h2>
            
            <!-- Filter -->
            <a href="#" class="d-flex align-items-center text-dark text-decoration-none" style="font-family: 'Poppins', sans-serif; font-size: 16px;">
                <span class="me-2">Filter</span>
                <img src="assets/images/arrrowFilter.png" alt="Filter Icon" style="width: 20px; height: 20px;">
            </a>
        </div>

        <!-- Menampilkan Buku -->
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-4 mb-5" id="bookResults">
            <?php
            // Ambil semua data buku dari database untuk tampilan awal
            $query = "SELECT * FROM books";
            $result = $conn->query($query);

            if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                ?>
                <div class="col">
                <div class="card h-100 shadow-sm" style="border-radius: 20px; background-color: #FFE6FF;">
                    <img src="assets/images/<?php echo $row['image']; ?>" class="card-img-top p-4" alt="<?php echo $row['title']; ?>" style="border-radius: 15px 15px 0 0;">
                    <div class="card-body text-center">
                    <h5 class="card-title mb-2 text-start" style="font-size: 1rem; font-weight: 700; font-family: 'Poppins', sans-serif;"><?php echo $row['title']; ?></h5>
                    <p class="card-text text-muted mb-4 text-start" style="font-size: 0.9rem; font-family: 'Poppins', sans-serif; font-weight: 600;"><?php echo $row['author']; ?></p>
                    <div class="d-flex justify-content-end align-items-center">
                        <a href="#" class="d-flex align-items-center justify-content-center" style="width: 40px; height: 40px; border: 2px solid #C5C5C5; border-radius: 50%; background-color: #fff; margin-right: 10px;">
                        <img src="assets/images/bookmark.png" alt="Bookmark Icon" style="width: 15px; height: 15px;">
                        </a>
                        <a href="#" class="btn d-flex align-items-center" style="background-color: #F9FEB1; border: 1px solid #C5C5C5; border-radius: 10px; padding: 0.5rem 1rem; font-size: 0.9rem; font-weight: 500;">
                        Baca
                        <img src="assets/images/play.png" alt="Play Icon" style="width: 16px; height: 16px; margin-left: 5px;">
                        </a>
                    </div>
                    </div>
                </div>
                </div>
                <?php
            }
            }
            ?>
        </div>
    </div>
</main>

<script>
    const searchInput = document.getElementById('searchInput');
    const searchResults = document.getElementById('searchResults');
    const bookResults = document.getElementById('bookResults');

    // Event untuk menangani input di kolom pencarian
    searchInput.addEventListener('input', function () {
    const query = searchInput.value;

    if (query.length > 0) {
        // Kirim request ke server untuk mendapatkan hasil pencarian
        fetch('search.php?search=' + encodeURIComponent(query))
            .then(response => response.json())
            .then(data => {
                searchResults.innerHTML = ''; // Kosongkan hasil sebelumnya
                if (data.length > 0) {
                    const regex = new RegExp(`(${query})`, 'gi'); // Buat regex dari query

                    data.forEach(book => {
                        const highlightedTitle = book.title.replace(regex, '<strong>$1</strong>');
                        const highlightedAuthor = book.author.replace(regex, '<strong>$1</strong>');

                        const item = document.createElement('li');
                        item.className = 'dropdown-item';
                        item.innerHTML = `${highlightedTitle} - ${highlightedAuthor}`;
                        item.dataset.id = book.id;
                        searchResults.appendChild(item);
                    });

                    searchResults.style.display = 'block';
                } else {
                    searchResults.style.display = 'none';
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
    } else {
        searchResults.style.display = 'none'; // Sembunyikan dropdown jika input kosong

        // Tampilkan semua data buku
        fetch('search.php?search_all=true')
            .then(response => response.json())
            .then(data => {
                bookResults.innerHTML = ''; // Kosongkan hasil sebelumnya
                data.forEach(book => {
                    const bookCard = `
                        <div class="col">
                            <div class="card h-100 shadow-sm" style="border-radius: 20px; background-color: #FFE6FF;">
                                <img src="assets/images/${book.image}" class="card-img-top p-4" alt="${book.title}" style="border-radius: 15px 15px 0 0;">
                                <div class="card-body text-center">
                                    <h5 class="card-title mb-2 text-start" style="font-size: 1rem; font-weight: 700; font-family: 'Poppins', sans-serif;">${book.title}</h5>
                                    <p class="card-text text-muted mb-4 text-start" style="font-size: 0.9rem; font-family: 'Poppins', sans-serif; font-weight: 600;">${book.author}</p>
                                    <div class="d-flex justify-content-end align-items-center">
                                        <a href="#" class="d-flex align-items-center justify-content-center" style="width: 40px; height: 40px; border: 2px solid #C5C5C5; border-radius: 50%; background-color: #fff; margin-right: 10px;">
                                            <img src="assets/images/bookmark.png" alt="Bookmark Icon" style="width: 15px; height: 15px;">
                                        </a>
                                        <a href="#" class="btn d-flex align-items-center" style="background-color: #F9FEB1; border: 1px solid #C5C5C5; border-radius: 10px; padding: 0.5rem 1rem; font-size: 0.9rem; font-weight: 500;">
                                            Baca
                                            <img src="assets/images/play.png" alt="Play Icon" style="width: 16px; height: 16px; margin-left: 5px;">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
                    bookResults.innerHTML += bookCard;
                });
            })
            .catch(error => {
                console.error('Error:', error);
            });
    }
});


    // Event untuk menangani klik pada item dropdown
    searchResults.addEventListener('click', function (e) {
        const target = e.target.closest('.dropdown-item');
        if (target) {
            const bookId = target.dataset.id;

            // Kirim request untuk mendapatkan detail buku berdasarkan ID
            fetch('search.php?book_id=' + bookId)
                .then(response => response.json())
                .then(data => {
                    if (data) {
                        bookResults.innerHTML = `
                            <div class="col">
                                <div class="card h-100 shadow-sm" style="border-radius: 20px; background-color: #FFE6FF;">
                                    <img src="assets/images/${data.image}" class="card-img-top p-4" alt="${data.title}" style="border-radius: 15px 15px 0 0;">
                                    <div class="card-body text-center">
                                        <h5 class="card-title mb-2 text-start" style="font-size: 1rem; font-weight: 700; font-family: 'Poppins', sans-serif;">${data.title}</h5>
                                        <p class="card-text text-muted mb-4 text-start" style="font-size: 0.9rem; font-family: 'Poppins', sans-serif; font-weight: 600;">${data.author}</p>
                                        <div class="d-flex justify-content-end align-items-center">
                                            <a href="#" class="d-flex align-items-center justify-content-center" style="width: 40px; height: 40px; border: 2px solid #C5C5C5; border-radius: 50%; background-color: #fff; margin-right: 10px;">
                                                <img src="assets/images/bookmark.png" alt="Bookmark Icon" style="width: 15px; height: 15px;">
                                            </a>
                                            <a href="#" class="btn d-flex align-items-center" style="background-color: #F9FEB1; border: 1px solid #C5C5C5; border-radius: 10px; padding: 0.5rem 1rem; font-size: 0.9rem; font-weight: 500;">
                                                Baca
                                                <img src="assets/images/play.png" alt="Play Icon" style="width: 16px; height: 16px; margin-left: 5px;">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `;
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }
    });
</script>


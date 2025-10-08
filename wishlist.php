<?php
// PHP untuk Simulasi Data Wishlist
$wishlist_items = [
    [
        'id' => 201,
        'nama' => 'Kursi Ergonomis Premium (Mesh Hitam)',
        'harga' => 4500000,
        'gambar' => 'kursi_premium.jpg',
        'tanggal_ditambahkan' => '2025-10-01',
        'link_produk' => '#',
    ],
    [
        'id' => 202,
        'nama' => 'Kamera Mirrorless Full Frame Seri X',
        'harga' => 22990000,
        'gambar' => 'kamera_ff.jpg',
        'tanggal_ditambahkan' => '2025-09-15',
        'link_produk' => '#',
    ],
    [
        'id' => 203,
        'nama' => 'Set Peralatan Kopi Drip & Gooseneck Kettle',
        'harga' => 950000,
        'gambar' => 'coffee_set.jpg',
        'tanggal_ditambahkan' => '2025-10-05',
        'link_produk' => '#',
    ],
];

function formatRupiah($angka) {
    return 'Rp ' . number_format($angka, 0, ',', '.');
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wishlist Produk Favorit</title>
    
    <style>
        :root {
            --primary-color: #333;      /* Abu-abu Gelap */
            --accent-color: #007bff;   /* Biru Klasik */
            --bg-color: #F8F9FA;       /* Latar Belakang Sangat Terang */
            --card-bg: #FFFFFF;
            --border-color: #EAEAEA;
            --text-light: #6c757d;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--bg-color);
            margin: 0;
            padding: 0;
            color: var(--primary-color);
        }

        .container {
            max-width: 1000px;
            margin: 50px auto;
            padding: 0 20px;
        }

        h1 {
            text-align: left;
            border-bottom: 2px solid var(--border-color);
            padding-bottom: 10px;
            font-weight: 300; /* Tipografi lebih ringan */
            font-size: 2.5em;
            margin-bottom: 40px;
        }
        
        /* Gaya Daftar (List) Wishlist */
        .wishlist-list {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .wishlist-item {
            display: flex;
            align-items: center;
            background-color: var(--card-bg);
            border: 1px solid var(--border-color);
            border-radius: 8px;
            padding: 20px;
            transition: box-shadow 0.2s ease;
        }
        
        /* Efek Hover Elegan */
        .wishlist-item:hover {
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        }

        .item-image {
            width: 100px;
            height: 100px;
            min-width: 100px; /* Penting agar tidak mengecil di mobile */
            border-radius: 6px;
            background-color: #eee;
            background-image: url('https://via.placeholder.com/100?text=Produk');
            background-size: cover;
            background-position: center;
            margin-right: 20px;
        }

        .item-details {
            flex-grow: 1;
        }

        .item-details h2 {
            font-size: 1.25em;
            margin: 0 0 5px 0;
            font-weight: 600;
        }
        
        .item-details a {
            text-decoration: none;
            color: var(--primary-color);
        }

        .item-details a:hover {
            color: var(--accent-color);
        }

        .item-price {
            font-size: 1.4em;
            color: var(--accent-color);
            font-weight: bold;
            margin: 5px 0 10px 0;
        }

        .item-date {
            font-size: 0.85em;
            color: var(--text-light);
        }

        /* Grup Aksi/Tombol */
        .item-actions {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-left: 20px;
        }
        
        .btn {
            padding: 8px 15px;
            border: 1px solid var(--accent-color);
            border-radius: 4px;
            font-size: 0.9em;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            transition: all 0.2s ease;
        }

        .btn-buy {
            background-color: var(--accent-color);
            color: white;
            border-color: var(--accent-color);
        }

        .btn-buy:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        
        .btn-remove {
            background-color: white;
            color: #dc3545; /* Merah untuk Hapus */
            border-color: #dc3545;
        }

        .btn-remove:hover {
            background-color: #dc3545;
            color: white;
        }
        
        /* Responsif */
        @media (max-width: 600px) {
            .wishlist-item {
                flex-direction: column;
                align-items: flex-start;
                text-align: left;
            }
            
            .item-image {
                margin-bottom: 15px;
            }
            
            .item-actions {
                flex-direction: row;
                margin-top: 15px;
                margin-left: 0;
                width: 100%;
            }
            
            .btn {
                flex: 1;
            }
        }
        
    </style>
</head>
<body>

<div class="container">
    <h1>Wishlist Produk Favorit</h1>
    
    <?php if (empty($wishlist_items)): ?>
        <?php else: ?>
    
        <div class="wishlist-list">
            
            <?php foreach ($wishlist_items as $item): ?>
                
                <div class="wishlist-item" id="item-<?= $item['id'] ?>">
                    <div class="item-image" style="background-image: url('https://via.placeholder.com/100?text=<?= urlencode(substr($item['nama'], 0, 15)) ?>');">
                    </div>
                    
                    <div class="item-details">
                        <h2>
                            <a href="<?= htmlspecialchars($item['link_produk']) ?>">
                                <?= htmlspecialchars($item['nama']) ?>
                            </a>
                        </h2>
                        
                        <p class="item-price"><?= formatRupiah($item['harga']) ?></p>
                        
                        <p class="item-date">Ditambahkan: <?= date('d F Y', strtotime($item['tanggal_ditambahkan'])) ?></p>
                    </div>
                    
                    <div class="item-actions">
                        <a href="#" class="btn btn-buy">
                            Beli Sekarang
                        </a>
                        
                        <button 
                            class="btn btn-remove" 
                            onclick="removeItem(<?= $item['id'] ?>, '<?= htmlspecialchars($item['nama']) ?>')"
                        >
                            Hapus
                        </button>
                    </div>
                </div>
                
            <?php endforeach; ?>
            
        </div>
        
    <?php endif; ?>

</div>

<script>
    function removeItem(itemId, itemName) {
        if (confirm(`Hapus "${itemName}" dari daftar?`)) {
            // Dalam aplikasi nyata, lakukan AJAX request ke server di sini.
            
            // Simulasi Penghapusan DOM:
            const itemElement = document.getElementById(`item-${itemId}`);
            if (itemElement) {
                // Animasi fade-out
                itemElement.style.opacity = '0';
                itemElement.style.maxHeight = '0'; // Untuk animasi yang rapi
                itemElement.style.padding = '0 20px';
                itemElement.style.overflow = 'hidden';
                itemElement.style.transition = 'all 0.3s ease';
                
                setTimeout(() => {
                    itemElement.remove();
                    // Optional: Cek apakah daftar kosong dan tampilkan pesan kosong.
                }, 300); 
                console.log(`Item ID ${itemId} dihapus.`);
            }
        }
    }
</script>

</body>
</html>
<?php
  require_once('config/koneksi.php');

  // Get all design
  $sql = "SELECT * FROM design JOIN pengguna ON design.id_pemilik = pengguna.id";
  $result = $conn->query($sql);
  $rows = $result->fetch_all(MYSQLI_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>homepage</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="assets/css/style.css" />
    <style>
      .navbar {
        position: sticky;
      }
    </style>
  </head>
  <body>
    <?php include 'partials/navbar.php'?>
    <style>
      main {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
      }

      .content-container {
        text-align: center;
        background-image: url("images/bg.png");
        height: 500px;
        padding-top: 100px;
        padding-right: 100px;
        padding-left: 100px;
      }
    </style>

    <div class="mb-5 container-fluid content-container">
      <div
        class="hero-categories filter-categories js-filter-categories js-shot-categories"
      >
        <span class="scroll scroll-backward"
          ><a class="d-none" href="#"
            ><svg
              xmlns="http://www.w3.org/2000/svg"
              width="24"
              height="24"
              viewBox="0 0 24 24"
              fill="none"
              role="img"
              class="icon"
            >
              <path
                d="M21.5265 8.77171C22.1578 8.13764 22.1578 7.10962 21.5265 6.47555C20.8951 5.84148 19.8714 5.84148 19.24 6.47555L11.9999 13.7465L4.75996 6.47573C4.12858 5.84166 3.10492 5.84166 2.47354 6.47573C1.84215 7.10979 1.84215 8.13782 2.47354 8.77188L10.8332 17.1671C10.8408 17.1751 10.8486 17.183 10.8565 17.1909C11.0636 17.399 11.313 17.5388 11.577 17.6103C11.5834 17.6121 11.5899 17.6138 11.5964 17.6154C12.132 17.7536 12.7242 17.6122 13.1435 17.1911C13.1539 17.1807 13.1641 17.1702 13.1742 17.1596L21.5265 8.77171Z"
              ></path>
            </svg> </a
        ></span>
        <span class="scroll scroll-forward"
          ><a class="" href="#"
            ><svg
              xmlns="http://www.w3.org/2000/svg"
              width="24"
              height="24"
              viewBox="0 0 24 24"
              fill="none"
              role="img"
              class="icon"
            >
              <path
                d="M21.5265 8.77171C22.1578 8.13764 22.1578 7.10962 21.5265 6.47555C20.8951 5.84148 19.8714 5.84148 19.24 6.47555L11.9999 13.7465L4.75996 6.47573C4.12858 5.84166 3.10492 5.84166 2.47354 6.47573C1.84215 7.10979 1.84215 8.13782 2.47354 8.77188L10.8332 17.1671C10.8408 17.1751 10.8486 17.183 10.8565 17.1909C11.0636 17.399 11.313 17.5388 11.577 17.6103C11.5834 17.6121 11.5899 17.6138 11.5964 17.6154C12.132 17.7536 12.7242 17.6122 13.1435 17.1911C13.1539 17.1807 13.1641 17.1702 13.1742 17.1596L21.5265 8.77171Z"
              ></path>
            </svg> </a
        ></span>
        <ul>
          <li class="hero-category category sets-path active">
            <a
              title="Discover"
              data-param="category"
              data-track-sub-nav="true"
              href="/shots/popular/"
              >Discover</a
            >
          </li>
          <li class="hero-category category sets-path">
            <a
              title="Animation"
              data-param="category"
              data-value="animation"
              data-track-sub-nav="true"
              href="/shots/popular/animation"
              >Animation</a
            >
          </li>
          <li class="hero-category category sets-path">
            <a
              title="Print"
              data-param="category"
              data-value="print"
              data-track-sub-nav="true"
              href="/shots/popular/print"
              >Print</a
            >
          </li>
          <li class="hero-category category sets-path">
            <a
              title="Product Design"
              data-param="category"
              data-value="product-design"
              data-track-sub-nav="true"
              href="/shots/popular/product-design"
              >Product Design</a
            >
          </li>
          <li class="hero-category category sets-path">
            <a
              title="Typography"
              data-param="category"
              data-value="typography"
              data-track-sub-nav="true"
              href="/shots/popular/typography"
              >Typography</a
            >
          </li>
          <li class="hero-category category sets-path">
            <a
              title="Web Design"
              data-param="category"
              data-value="web-design"
              data-track-sub-nav="true"
              href="/shots/popular/web-design"
              >Web Design</a
            >
          </li>
        </ul>
      </div>
      <h1 class="text-white">
        Desain produk yang sedang tren untuk aplikasi, e-commerce, dan game
      </h1>
      <p class="text-white home-desc">
        Jelajahi Desain Produk inovatif mulai dari menyertakan aplikasi,
        e-niaga, atau game untuk menginspirasi proyek Anda selanjutnya dari
        portofolio desain populer
      </p>
      <div class="search-input-hero search-input-with-dropdown">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          width="16"
          height="16"
          viewBox="0 0 16 16"
          fill="none"
          role="img"
          class="icon fill-current search-icon"
        >
          <path
            fill-rule="evenodd"
            clip-rule="evenodd"
            d="M10.6002 12.0498C9.49758 12.8568 8.13777 13.3333 6.66667 13.3333C2.98477 13.3333 0 10.3486 0 6.66667C0 2.98477 2.98477 0 6.66667 0C10.3486 0 13.3333 2.98477 13.3333 6.66667C13.3333 8.15637 12.8447 9.53194 12.019 10.6419C12.0265 10.6489 12.0338 10.656 12.0411 10.6633L15.2935 13.9157C15.6841 14.3063 15.6841 14.9394 15.2935 15.33C14.903 15.7205 14.2699 15.7205 13.8793 15.33L10.6269 12.0775C10.6178 12.0684 10.6089 12.0592 10.6002 12.0498ZM11.3333 6.66667C11.3333 9.244 9.244 11.3333 6.66667 11.3333C4.08934 11.3333 2 9.244 2 6.66667C2 4.08934 4.08934 2 6.66667 2C9.244 2 11.3333 4.08934 11.3333 6.66667Z"
          ></path>
        </svg>

        <form
          action="/search"
          class="js-search-input-form search-input-form"
          method="get"
        >
          <label for="search" class="accessibility-text">Search</label>
          <input
            id="search"
            type="search"
            name="q"
            placeholder="Search..."
            value=""
            class="search-input js-search-input"
          />
        </form>
      </div>
    </div>
    <div class="mt-5 container list-desain">
      <div class="row">
        <?php foreach($rows as $row):?>
          <div class="col-4 mt-4">
            <div class="card">
              <img
                src="assets/designer/portfolio/<?=$row['tautan_gambar'] ?>"
                class="card-img-top"
                alt="..."
              />
              <div class="card-body">
                <p class="card-text single-line">
                <?=$row['deskripsi'] ?>
                </p>
                <p>Designer : <b><?=$row['nama_pengguna'] ?></b></p>
              </div>
            </div>
          </div>
        <?php endforeach ?>
     
        
      </div>
    </div>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
      crossorigin="anonymous"
    ></script>
  </body>
</html>

<article>
 <div class="navigation">
      <ul>
        <li class="list active">
          <a href="#">
            <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
            <span class="title">ホーム</span>
          </a>
        </li>
        <li class="list">
          <a href="#">
            <span class="icon"
              ><ion-icon name="person-circle-outline"></ion-icon
            ></span>
            <span class="title">プロフィール</span>
          </a>
        </li>
        <li class="list">
          <a href="#">
            <span class="icon"><ion-icon name="tv-outline"></ion-icon></span>
            <span class="title">チャンネル</span>
          </a>
        </li>
        <li class="list">
          <a href="#">
            <span class="icon"
              ><ion-icon name="settings-outline"></ion-icon
            ></span>
            <span class="title">設定</span>
          </a>
        </li>
        <li class="list">
          <a href="#">
            <span class="icon"
              ><ion-icon name="id-card-outline"></ion-icon
            ></span>
            <span class="title">個人情報</span>
          </a>
        </li>
        <li class="list">
          <a href="#">
            <span class="icon"
              ><ion-icon name="help-circle-outline"></ion-icon
            ></span>
            <span class="title">ヘルプ</span>
          </a>
        </li>
        <li class="list">
          <a href="#">
            <span class="icon"
              ><ion-icon name="log-out-outline"></ion-icon
            ></span>
            <span class="title">サインアウト</span>
          </a>
        </li>
      </ul>
    </div>
    <div class="content">

    <script
      type="module"
      src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"
    ></script>
    <script
      nomodule
      src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"
    ></script>
    <script>
      const list = document.querySelectorAll(".list");
      console.log(list);
      function activeLink() {
        list.forEach((item) =>
          // console.log(item);
          item.classList.remove("active")
        );
        this.classList.add("active");
      }

      list.forEach((item) => {
        item.addEventListener("click", activeLink);
      });
    </script>
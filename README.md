<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <style>
    body {
      background: #f4f4f4;
      text-align: center;
      padding-top: 50px;
    }
    .container {
      background: white;
      padding: 30px;
      border-radius: 10px;
      width: 300px;
      margin: auto;
      box-shadow: 0 0 10px gray;
    }
    button {
      padding: 10px;
      font-size: 16px;
      cursor: pointer;
    }
    audio {
      margin-top: 15px;
      width: 90%;
    }
  </style>
</head>
<body>

  <div id="quest1" class="container">
    <h1>Music Shop</h1>
    <button onclick="color(10, 'Tasodifiy musiqa')">1 ta music 10$</button>
    <h2>Sizning mablag'ingiz:</h2>
    <h2 id="balance">500</h2>
    <div id="message" class="result"></div>
    <div id="musicBox"></div>
  </div>

  <script>
    let balance = 500;

    const musics = [
      { name: "Epic Cinematic", artist: "Audio Jungle", url: "https://www.soundhelix.com/examples/mp3/SoundHelix-Song-1.mp3" },
      { name: "Relaxing Beat", artist: "FreeSound", url: "https://www.soundhelix.com/examples/mp3/SoundHelix-Song-2.mp3" },
      { name: "Chill Vibes", artist: "Unknown", url: "https://www.soundhelix.com/examples/mp3/SoundHelix-Song-3.mp3" }
    ];

    function color(narx, nomi) {
      const message = document.getElementById("message");
      const balancee = document.getElementById("balance");
      const musicBox = document.getElementById("musicBox");

      if (balance >= narx) {
        balance -= narx;
        balancee.textContent = balance;
        message.textContent = ` ${nomi} sotib olindi. ${narx}$ yechildi.`;

        const randomIndex = Math.floor(Math.random() * musics.length);
        const selected = musics[randomIndex];

        musicBox.innerHTML = `
          <p><strong>${selected.name}</strong> - ${selected.artist}</p>
          <audio controls src="${selected.url}"></audio>
        `;
      } else {
        message.textContent = "Balans yetarli emas";
        musicBox.innerHTML = "";
      }
    }
  </script>

</body>
</html>

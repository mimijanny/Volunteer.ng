const TeamList = document.querySelector(".container");
let team = [
  {
    name: "Abasifreke Ekwere",
    track: "Front End",
    image: "../images/disaster.jpg"
  },
  {
    name: "Abasifreke Ekwere",
    track: "Front End",
    image: "../images/disaster.jpg"
  },
  {
    name: "Abasifreke Ekwere",
    track: "Front End",
    image: "../images/disaster.jpg"
  },
  {
    name: "Abasifreke Ekwere",
    track: "Front End",
    image: "../images/disaster.jpg"
  },
  {
    name: "Abasifreke Ekwere",
    track: "Front End",
    image: "../images/disaster.jpg"
  },
  {
    name: "Abasifreke Ekwere",
    track: "Front End",
    image: "../images/disaster.jpg"
  },
  {
    name: "Abasifreke Ekwere",
    track: "Front End",
    image: "../images/disaster.jpg"
  },
  {
    name: "Abasifreke Ekwere",
    track: "Front End",
    image: "../images/disaster.jpg"
  }
];

let output = "";

team.forEach(team => {
  output += `
  <div class="member">
  <img src=${team.image} /> <br />
  <h3>${team.name}</h3>
  <p>
      Team Member <br><br>
      Project Role: ${team.track}
  </p>
  <br>
  <a href=""><i class="fab fa-facebook"></i> </a> &nbsp; &nbsp; &nbsp;
  <a href=""><i class="fab fa-instagram"></i> </a> &nbsp; &nbsp; &nbsp;
  <a href=""><i class="fab fa-twitter"></i> </a> &nbsp; &nbsp; &nbsp;
  <a href=""><i class="fab fa-youtube"></i> </a> &nbsp; &nbsp; &nbsp;
  </div>`;
});
TeamList.innerHTML = output;

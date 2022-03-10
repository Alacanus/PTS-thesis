<?php

/**
 * PHP PRG (Post-Redirect-Get)
 * solve double submit problem
 */
?>
<?php
require __DIR__ . '/../src/bootstrap.php';
?>

<?php view('header', ['title' => 'PTS']) ?>
<main id="mymain1">
  <div class="landing-page">

    <div class="lp-container">

      <section class="lp-section--1">
        <div class="banner--container">
          <video src="/PTS-thesis/static/lp-vid2.mp4" loop muted autoplay></video>
          <div class="banner--content">
            <h2>Personal Tutoring Services</h2>
            <h3>A place where you can hire your own personal tutor.</h3>
          </div>
        </div>
      </section>
      <section class="lp-section--2">
        <div class="search-container">
          <div class="search--item--1">
            <label for="#"><i></i>Search</label>
          </div>
          <div class="search--item--2">
            <input type="text">
          </div>
          <div class="search--item--3">
            <label for="#">Sort By: </label>
          </div>
          <div class="search--item--4">
            <select name="Filter" id="filter">
              <option value="#">Name</option>
              <option value="#">Date</option>
              <option value="#">Popular</option>
              <option value="#">Trending</option>
            </select>
          </div>
          <div class="search--item--5">
            <select name="Category" id="Category">
              <option value="#">Cooking</option>
              <option value="#">Carpentry</option>
              <option value="#">Web Design</option>
              <option value="#">Web Development</option>
            </select>
          </div>
          <div class="search--item--6">
            <button class="btn btn-full btn-nav">Search</button>
          </div>
        </div>
        <div class="grid-container">
          <div class="card">
            <div class="card-header">
              <img src="/PTS-thesis/static/ourteam01.jpg" alt="Card-Header">
            </div>
            <div class="card-body">
              <div class="card-title">
                <p>Genesis Fragas</p>
              </div>
              <span class="tag tag-blue">Front-End Developer</span>
              <div class="card-desc">
                <p>
                  I'm the Front-End Developer of Team Sage Main
                </p>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header">
              <img src="/PTS-thesis/static/loginbg.jpg" alt="Card-Header">
            </div>
            <div class="card-body">
              <div class="card-title">
                <p>Mark Henrick Linsangan</p>
              </div>
              <span class="tag tag-blue">Back-End Developer</span>
              <div class="card-desc">
                <p>
                  I'm the Back-End Developer of Team Sage Main
                </p>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header">
              <img src="/PTS-thesis/static/instructorpf.jpg" alt="Card-Header" id="ourteam03">
            </div>
            <div class="card-body">
              <div class="card-title">
                <p>Sean Dennie Go</p>
              </div>
              <span class="tag tag-cyan">Documentation</span>
              <div class="card-desc">
                <p>
                  I'm part of Team Sage Main
                </p>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header">
              <img src="/PTS-thesis/static/ourteam04.jpg" alt="Card-Header" id="ourteam04">
            </div>
            <div class="card-body">
              <div class="card-title">
                <p>Samuel Narbuada</p>
              </div>
              <span class="tag tag-cyan">Documentation</span>
              <div class="card-desc">
                <p>
                  I'm part of Team Sage Main
                </p>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header">
              <img src="/PTS-thesis/static/ourteam01.jpg" alt="Card-Header">
            </div>
            <div class="card-body">
              <div class="card-title">
                <p>Genesis Fragas</p>
              </div>
              <span class="tag tag-blue">Front-End Developer</span>
              <div class="card-desc">
                <p>
                  I'm the Front-End Developer of Team Sage Main
                </p>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header">
              <img src="/PTS-thesis/static/loginbg.jpg" alt="Card-Header">
            </div>
            <div class="card-body">
              <div class="card-title">
                <p>Mark Henrick Linsangan</p>
              </div>
              <span class="tag tag-blue">Back-End Developer</span>
              <div class="card-desc">
                <p>
                  I'm the Back-End Developer of Team Sage Main
                </p>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header">
              <img src="/PTS-thesis/static/instructorpf.jpg" alt="Card-Header" id="ourteam03">
            </div>
            <div class="card-body">
              <div class="card-title">
                <p>Sean Dennie Go</p>
              </div>
              <span class="tag tag-cyan">Documentation</span>
              <div class="card-desc">
                <p>
                  I'm part of Team Sage Main
                </p>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header">
              <img src="/PTS-thesis/static/ourteam04.jpg" alt="Card-Header" id="ourteam04">
            </div>
            <div class="card-body">
              <div class="card-title">
                <p>Samuel Narbuada</p>
              </div>
              <span class="tag tag-cyan">Documentation</span>
              <div class="card-desc">
                <p>
                  I'm part of Team Sage Main
                </p>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
</main>

<?php view('footer') ?>
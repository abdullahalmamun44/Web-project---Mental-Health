<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Nirvoy – Phobia</title>
    <style>
      * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
      }

      body {
        background: #f7f8ff;
        min-height: 100vh;
        display: flex;
        flex-direction: column;
      }

      .top-bar {
        background: #4a90e2;
        color: white;
        padding: 1rem;
        text-align: center;
        font-size: 1.3rem;
        font-weight: bold;
      }

      .page-wrapper {
        flex: 1;
        display: flex;
        flex-direction: column;
        padding: 20px 40px 60px;
      }

      h1 {
        text-align: center;
        margin-bottom: 20px;
        font-size: 24px;
        color: #222;
      }

      .phobia {
        background: #ffffff;
        border-radius: 10px;
        box-shadow: 0 0 6px rgba(0, 0, 0, 0.08);
        padding: 16px 18px;
        margin-bottom: 16px;
      }

      .phobia-title {
        font-size: 18px;
        font-weight: bold;
        color: #3949ab;
        margin-bottom: 6px;
        text-align: center;
        font: bold;
      }

      .phobia-subtitle {
        font-size: 13px;
        color: #777;
        margin-bottom: 6px;
        text-align: center;
      }

      .phobia-text {
        font-size: 14px;
        color: #333;
        line-height: 1.4;
      }

      .phobia-name {
        font-weight: bold;
        color: #222;
        text-align: center;
      }

      .bottom-nav {
        position: fixed;
        bottom: 0;
        width: 100%;
        background: white;
        display: flex;
        justify-content: space-around;
        padding: 1rem 0;
        box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.1);
        border-top: 1px solid #ddd;
      }

      .bottom-nav a {
        text-align: center;
        font-size: 1rem;
        color: #333;
        text-decoration: none;
        transition: color 0.2s ease;
      }

      .bottom-nav a:hover {
        color: #007bff;
      }

      .bottom-nav a.active {
        color: #4a90e2;
        font-weight: bold;
      }

      .images {
        display: block;
        margin: 20px auto;
        max-width: 25%;
        height: auto;
        border-radius: 8px;
      }

      @media (max-width: 600px) {
        .section img {
          width: 90%;
        }

        .bottom-nav a {
          font-size: 0.9rem;
        }
      }
    </style>
  </head>
  <body>
    <div class="top-bar">Phobias and How to Cope</div>

    <div class="page-wrapper">
      <section class="phobia">
        <img
          src="image/Agoraphobia.png"
          alt="image of Agoraphobia"
          class="images"
        />
        <div class="phobia-title">Agoraphobia</div>
        <div class="phobia-subtitle">
          Fear of places where escape feels hard or help may be unavailable.
        </div>
        <p class="phobia-text">
          <span class="phobia-name">What it is:</span>
          Strong fear of being in crowds, public transport, or open spaces where
          panic might happen and feel impossible to escape.
        </p>
        <p class="phobia-text">
          <span class="phobia-name">Symptoms & how to avoid problems:</span>
          People often avoid going out alone, feel trapped, or have panic
          symptoms like racing heart and dizziness; gradual exposure with
          support and breathing exercises can slowly reduce this avoidance.
        </p>
      </section>

      <section class="phobia">
        <img
          src="image/Social Phobia.png"
          alt="image of Social Phobia"
          class="images"
        />
        <div class="phobia-title">Social Phobia (Social Anxiety)</div>
        <div class="phobia-subtitle">
          Fear of being judged, embarrassed, or rejected in social situations.
        </div>
        <p class="phobia-text">
          <span class="phobia-name">What it is:</span>
          Intense anxiety in situations like meeting new people, speaking in
          groups, or being the center of attention because of worry about
          criticism or embarrassment.
        </p>
        <p class="phobia-text">
          <span class="phobia-name">Symptoms & how to avoid problems:</span>
          People may blush, tremble, avoid social events, or overthink
          conversations; small practice steps, self‑compassion, and talking
          therapies can help build confidence instead of always avoiding others.
        </p>
      </section>

      <section class="phobia">
        <img
          src="image/Claustrophobia.png"
          alt="image of Claustrophobia"
          class="images"
        />
        <div class="phobia-title">Claustrophobia</div>
        <div class="phobia-subtitle">
          Fear of enclosed or very small spaces.
        </div>
        <p class="phobia-text">
          <span class="phobia-name">What it is:</span>
          Strong fear in lifts, small rooms, or crowded vehicles where there
          seems to be little space or no easy way out.
        </p>
        <p class="phobia-text">
          <span class="phobia-name">Symptoms & how to avoid problems:</span>
          People may feel short of breath, sweaty, or desperate to escape;
          learning calming breathing, planning safe exits, and slowly practising
          short stays in safe small spaces can make situations more manageable.
        </p>
      </section>

      <section class="phobia">
        <img
          src="image/Acrophobia.png"
          alt="image of Acrophobia"
          class="images"
        />
        <div class="phobia-title">Acrophobia</div>
        <div class="phobia-subtitle">
          Fear of heights, such as high buildings or bridges.
        </div>
        <p class="phobia-text">
          <span class="phobia-name">What it is:</span>
          A strong fear response when looking down from high places or even
          imagining being high above the ground.
        </p>
        <p class="phobia-text">
          <span class="phobia-name">Symptoms & how to avoid problems:</span>
          People may feel dizzy, unsteady, or panic and avoid stairs, balconies,
          or tall buildings; gentle step‑by‑step exposure with support can help
          the brain learn that safe heights are not dangerous.
        </p>
      </section>

      <section class="phobia">
        <img
          src="image/Specific Phobia.png"
          alt="image of Specific Phobias"
          class="images"
        />
        <div class="phobia-title">
          Specific Phobias (Animals, Objects, Situations)
        </div>
        <div class="phobia-subtitle">
          Examples: spiders, dogs, injections, flying, water.
        </div>
        <p class="phobia-text">
          <span class="phobia-name">What they are:</span>
          Intense fear of a particular thing or situation that is usually not
          truly dangerous, like certain animals, medical needles, or airplanes.
          [web:18][web:24][web:33]
        </p>
        <p class="phobia-text">
          <span class="phobia-name">Symptoms & how to avoid problems:</span>
          People may have fast heartbeat, sweating, or panic and go out of their
          way to avoid triggers; gradually facing the fear in a controlled way
          and using relaxation helps reduce the urge to escape.
          [web:22][web:24][web:34]
        </p>
      </section>

      <section class="phobia">
        <img
          src="image/Need Help.png"
          alt="image of seeking help/need help?"
          class="images"
        />
        <div class="phobia-title">When to Seek Help</div>
        <p class="phobia-text">
          If a fear lasts many months, causes panic, or stops school, work, or
          relationships, talking to a mental health professional can give safe,
          effective treatments like counselling and gradual exposure.
          [web:31][web:33]
        </p>
        <p class="phobia-text">
          If there is ever a risk of self‑harm or medical emergency, contact
          local emergency services or a trusted adult/doctor immediately instead
          of facing it alone. [web:31][web:33]
        </p>
      </section>
    </div>

    <div class="bottom-nav">
      <a href="dashboard.php">Dashboard</a>
      <a href="mood.php">Mood</a>
      <a href="consulting.php">Consulting</a>
      <a href="setting.php">Setting</a>
    </div>
  </body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>PetCare</title>
    <style>
    /* Reset */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    html, body {
      height: 100%;
    }

    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      line-height: 1.6;
      background: #f9f9f9;
      color: #333;
      display: flex;
      flex-direction: column;
    }

    .container {
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }

    nav {
      background-color: #030a47e2;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 1rem 2rem;
      flex-wrap: wrap;
      position: relative;
    }

    .logo {
      font-size: 2rem;
      font-weight: bold;
      color: white;
    }

    nav ul {
      list-style: none;
      display: flex;
      gap: 1.5rem;
      flex-wrap: wrap;
    }

    nav ul li a {
      color: white;
      text-decoration: none;
      font-weight: bold;
      transition: color 0.3s;
    }

    nav ul li a:hover {
      color: #fffde7;
    }

    /* Hamburger icon */
    .menu-toggle {
      display: none;
      font-size: 2rem;
      color: white;
      cursor: pointer;
    }

    /* Hero Section */
    .hero {
      display: flex;
      justify-content: center;
      align-items: center;
      background: linear-gradient(to right, #fcd5ce, #fff0f0);
      padding: 0;
    }

    .hero img {
      width: 100%;
      max-height: 500px;
      object-fit: cover;
    }

    .features {
      padding: 3rem 2rem;
      text-align: center;
      background-color: #fff;
    }

    .features h2 {
      margin-bottom: 2rem;
      color: #ff7f50;
      font-size: 2.2rem;
    }

    .feature-list {
      display: flex;
      flex-wrap: wrap;
      gap: 2rem;
      justify-content: center;
    }

    .feature-card {
      background: #fff7f0;
      border-radius: 15px;
      padding: 1.5rem;
      width: 300px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
      text-align: center;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .feature-card:hover {
      transform: translateY(-6px);
      box-shadow: 0 8px 20px rgba(0,0,0,0.2);
    }

    .feature-card img {
      width: 100%;
      max-width: 200px;
      height: auto;
      margin-bottom: 1rem;
    }

    .feature-card h3 {
      color: #333;
      margin-bottom: 0.5rem;
      font-size: 1.4rem;
    }

    .form {
      background-color: #fef6f0;
      padding: 3rem 1rem;
      text-align: center;
    }

    .form h2 {
      color: #ff7f50;
      font-size: 2rem;
      margin-bottom: 1rem;
    }

    .form p {
      margin-bottom: 2rem;
      color: #555;
    }

    form {
      max-width: 700px;
      margin: auto;
    }

    .form-group {
      display: flex;
      gap: 1rem;
      margin-bottom: 1rem;
      flex-wrap: wrap;
    }

    .form-group input {
      flex: 1;
      padding: 0.8rem;
      border: 1px solid #ccc;
      border-radius: 8px;
      font-size: 1rem;
    }

    .checkbox-group {
      display: flex;
      flex-direction: column;
      align-items: flex-start;
      margin: 1.5rem 0;
      padding: 0 1rem;
    }

    .checkbox-group label {
      margin: 0.5rem 0;
      font-size: 1rem;
    }

    button[type="submit"] {
      background-color: #ff7f50;
      color: white;
      border: none;
      padding: 0.8rem 2rem;
      border-radius: 8px;
      cursor: pointer;
      font-size: 1.1rem;
      transition: background-color 0.3s;
    }

    button[type="submit"]:hover {
      background-color: #e35d3d;
    }

    footer {
      background-color: #030a47e2;
      color: white;
      padding: 2rem 1rem;
      text-align: center;
      margin-top: auto;
    }

    footer div {
      margin-bottom: 0.5rem;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
      .menu-toggle {
        display: block;
      }

      nav ul {
        display: none;
        flex-direction: column;
        align-items: center;
        width: 100%;
        background-color: #030a47e2;
        margin-top: 1rem;
        padding: 1rem 0;
      }

      nav ul.show {
        display: flex;
      }

      nav ul li {
        width: 100%;
        text-align: center;
        padding: 0.5rem 0;
      }

      .form-group {
        flex-direction: column;
      }

      .feature-list {
        flex-direction: column;
        align-items: center;
      }

      .hero img {
        max-height: 300px;
      }

      .feature-card {
        width: 90%;
      }

      button[type="submit"] {
        width: 100%;
      }
    }

    @media (max-width: 480px) {
      .logo {
        font-size: 1.5rem;
      }

      nav ul {
        gap: 0.8rem;
      }

      .features h2,
      .form h2 {
        font-size: 1.6rem;
      }

      .form-group input {
        font-size: 0.95rem;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    @include('component.include.header')

    @yield('content')

    @include('component.include.footer')
  </div>
</body>
</html>

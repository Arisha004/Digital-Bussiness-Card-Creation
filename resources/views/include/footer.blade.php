<html>
  <style>
    
        /* Footer styles */
        .site-footer {
            background: #111;
            color: #ccc;
            font-family: 'Segoe UI', sans-serif;
         
        }

        .footer-container {
            max-width: 1200px;
            margin: auto;
            padding: 40px 20px;
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 20px;
        }

        .footer-logo {
            font-size: 30px;
            font-weight: bold;
            color: #fff;
            text-decoration: none;
        }

       

        .footer-links {
            display: flex;
            gap: 25px;
            flex-wrap: wrap;
        }

        .footer-links a {
            color: #ccc;
            text-decoration: none;
            font-size: 20px;
            transition: color 0.3s ease;
        }

        .footer-links a:hover {
            color: #0d6efd;
        }

        .footer-bottom {
            border-top: 1px solid #222;
            text-align: center;
            padding: 15px;
            font-size: 13px;
            color: #888;
        }
  </style>
<footer class="site-footer">
    <div class="footer-container">
        <!-- Brand -->
        <div class="footer-brand">
            <a href="{{ url('/') }}" class="footer-logo">Cardly</a>
        </div>

        <!-- Links -->
        <div class="footer-links">
            <a href="/about">About</a>
            <a href="/contact">Contact</a>
            <a href="/privacy">Privacy</a>
            <a href="/terms">Terms</a>
        </div>
    </div>

    <div class="footer-bottom">
        © 2025 Cardly. All rights reserved.
    </div>
</footer>
</html>
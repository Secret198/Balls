<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Visa info')</title>
    <style>
        /* Custom styles to match the image's clean, dark aesthetic */
       :root {
            --primary-blue: #0056D6;
            --accent-dark: #1a1a1a;
            --bg-light: #f7f7f7;
            --inter-font: 'Inter', sans-serif;
        }

        /* Base Styles and Layout Containers */
        body {
            background-color: var(--bg-light);
            font-family: var(--inter-font);
            padding: 2rem; /* p-8 */
        }
        
        /* Responsive body padding (md:p-12) */
        @media (min-width: 768px) {
            body {
                padding: 3rem;
            }
        }

        .main-content-area {
            max-width: 1200px; 
            margin: 0 auto; 
        }

        /* --- Header and Navigation --- */
        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 4rem; 
        }
        .logo {
            font-size: 1.875rem; 
            font-weight: 800; 
            color: var(--primary-blue);
        }
        .nav-links {
            display: flex;
            gap: 1.5rem; 
            font-weight: 600; 
            align-items: center;
        }
        .nav-link {
            color: #4b5563; 
            transition: color 0.3s;
            text-decoration: none;
        }
        .nav-link:hover {
            color: var(--primary-blue);
        }
        .btn-dark {
            background-color: var(--accent-dark);
            color: white;
            padding: 0.625rem 1.25rem; 
            border-radius: 0.75rem; 
            transition: background-color 0.3s, box-shadow 0.3s;
            box-shadow: 0 10px 15px -3px rgba(0,0,0,0.1), 0 4px 6px -2px rgba(0,0,0,0.05); 
            font-weight: 600;
            border: none;
            cursor: pointer;
        }
        .btn-dark:hover {
            background-color: #374151; 
        }

        /* --- Hero Section --- */
        .hero-section {
            margin-bottom: 5rem; 
            text-align: center;
            background-color: white;
            padding: 2rem; 
            border-radius: 1.5rem; 
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 8px 10px -6px rgba(0, 0, 0, 0.1); 
            border-top: 4px solid var(--primary-blue); 
        }
        @media (min-width: 768px) {
            .hero-section {
                padding: 4rem; 
            }
        }

        .hero-title {
            font-size: 3rem; 
            font-weight: 800; 
            color: var(--accent-dark);
            margin-bottom: 1rem; 
            letter-spacing: -0.025em; 
        }
        @media (min-width: 768px) {
            .hero-title {
                font-size: 3.75rem; 
            }
        }

        .hero-description {
            font-size: 1.25rem; 
            color: #4b5563; 
            max-width: 64rem; 
            margin: 0 auto 2.5rem; 
            line-height: 1.625; 
        }
        .btn-hero {
            display: inline-block;
            background-color: var(--primary-blue);
            color: white;
            font-weight: 700;
            padding: 1rem 3rem; 
            font-size: 1.125rem; 
            border-radius: 9999px; 
            box-shadow: 0 25px 50px -12px rgba(66, 153, 225, 0.5); 
            transition: all 0.3s ease;
            text-decoration: none;
            border: none;
            cursor: pointer;
        }
        .btn-hero:hover {
            background-color: #0042a3; 
            transform: scale(1.05); 
        }

        /* --- Search and Form --- */
        .search-header {
            font-size: 2.25rem; 
            font-weight: 700; 
            color: var(--accent-dark);
            margin-bottom: 2.5rem; 
            border-bottom: 2px solid #d1d5db; 
            padding-bottom: 0.75rem; 
        }

        .form-summary-grid {
            display: grid;
            gap: 3rem; 
        }
        @media (min-width: 1024px) {
            .form-summary-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr)); 
            }
        }
        
        /* Input elements */
        .input-group {
            margin-bottom: 1.5rem; 
        }
        .input-label {
            font-weight: 600; 
            color: #333;
            margin-bottom: 6px;
        }
        .informational-text {
            color: #777;
            font-size: 0.85rem;
            margin-top: 4px;
        }
        .text-input, .select-input {
            width: 50%;
            padding: 12px; 
            border: 1px solid #ddd;
            border-radius: 10px; 
            background-color: white;
            transition: all 0.2s;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05); 
        }
        .text-input:focus, .select-input:focus {
            outline: none;
            border-color: var(--primary-blue);
            box-shadow: 0 0 0 3px rgba(0, 86, 214, 0.2); 
        }
        
        /* Buttons */
        .form-buttons {
            display: flex;
            gap: 1rem; 
            padding-top: 1rem; 
        }
        .btn-submit {
            background-color: var(--primary-blue);
            color: white;
            font-weight: 700;
            padding: 0.75rem 2rem; 
            border-radius: 0.75rem; 
            box-shadow: 0 10px 15px -3px rgba(66, 153, 225, 0.5); 
            transition: all 0.2s ease;
            border: none;
            cursor: pointer;
        }
        .btn-submit:hover {
            background-color: #0042a3; 
            transform: translateY(-0.125rem); 
        }
        .btn-clear {
            background-color: #e5e7eb; 
            color: var(--accent-dark);
            font-weight: 600;
            padding: 0.75rem 2rem; 
            border-radius: 0.75rem; 
            transition: background-color 0.3s;
            border: none;
            cursor: pointer;
        }
        .btn-clear:hover {
            background-color: #d1d5db; 
        }

        /* --- Summary Panel --- */
        .summary-box {
            border: 1px solid #e0e0e0;
            background-color: white;
            padding: 24px;
            border-radius: 12px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
        }
        .summary-placeholder {
            color: #6b7280; 
            font-style: italic;
            text-align: center;
            padding-top: 2.5rem; 
            padding-bottom: 2.5rem;
        }
        .summary-placeholder-text {
            font-size: 1.125rem; 
            font-weight: 500; 
            margin-bottom: 0.5rem; 
        }

                .country-card {
            border: 1px solid #e0e0e0;
            background-color: white;
            padding: 24px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }
        
        .card-header {
            border-bottom: 2px solid var(--primary-blue);
            padding-bottom: 12px;
            margin-bottom: 20px;
        }
        
        .card-title {
            font-size: 2rem;
            font-weight: 800;
            color: var(--primary-blue);
            margin: 0;
        }

        .section-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--accent-dark);
            margin: 1.5rem 0 1rem 0;
            padding-bottom: 5px;
            border-bottom: 1px dashed #d1d5db;
        }

        /* Fact Grid */
        .fact-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
            font-size: 0.95rem;
        }

        .fact-item {
            display: flex;
            flex-direction: column;
            padding: 0.5rem 0;
        }

        .fact-label {
            font-weight: 600;
            color: #6b7280; 
            font-size: 0.85rem;
            margin-bottom: 2px;
            text-transform: uppercase;
        }

        .fact-value {
            font-weight: 500;
            color: var(--accent-dark);
        }

        /* Highlighted Visa Rule Box */
        .rule-highlight {
            background-color: #e6fffa; 
            border: 1px solid #a3fbd3;
            padding: 1rem;
            border-radius: 8px;
            margin-top: 1.5rem;
        }
        
        .rule-type {
            font-weight: 700;
            color: #047857; 
            margin-bottom: 0.25rem;
        }
        
        .rule-duration {
            font-weight: 600;
            color: #059669; 
            font-size: 1.1rem;
        }
        
        /* Utility for links */
        .external-link {
            display: inline-block;
            margin-top: 1rem;
            color: var(--primary-blue);
            text-decoration: none;
            font-weight: 600;
            font-size: 0.9rem;
        }
        .external-link:hover {
            text-decoration: underline;
        }
    </style>
    <!-- CSS, scripts, etc. -->
</head>
<body>
    <!-- <a href="/">Home</a>
    <button id="fi">FI</button>
    <button id="en">EN</button> -->


        <!-- Navigation Bar Container -->
    <div style="display: flex; 
                align-items: center; 
                padding: 10px 40px; 
                background-color: #ffffff; 
                border-bottom: 1px solid #e5e7eb; 
                box-shadow: 0 1px 3px rgba(0,0,0,0.05);">
        
        <!-- Home Link -->
        <a href="/" 
           style="font-weight: 700; 
                  color: #0056D6; /* Primary Blue */
                  text-decoration: none; 
                  font-size: 1.1rem; 
                  margin-right: 30px;">
            Home
        </a>

        <!-- Language Buttons (Pushed to the right) -->
        <div style="margin-left: auto; 
                    display: flex; 
                    gap: 10px;">
            
            <button id="fi" 
                    style="padding: 8px 16px; 
                           border: 1px solid #0056D6; 
                           border-radius: 6px; 
                           background-color: #ffffff; 
                           color: #0056D6; 
                           font-weight: 600; 
                           cursor: pointer; 
                           transition: background-color 0.15s, color 0.15s;" 
                    onmouseover="this.style.backgroundColor='#e0f2ff';"
                    onmouseout="this.style.backgroundColor='#ffffff';">
                FI
            </button>
            
            <button id="en" 
                    style="padding: 8px 16px; 
                           border: 1px solid #0056D6; 
                           border-radius: 6px; 
                           background-color: #0056D6; /* Active style */
                           color: #ffffff; 
                           font-weight: 600; 
                           cursor: pointer; 
                           transition: background-color 0.15s;"
                    onmouseover="this.style.backgroundColor='#0044ab';"
                    onmouseout="this.style.backgroundColor='#0056D6';">
                EN
            </button>
        </div>
    </div>
    <div class="container">
        @yield('content')
    </div>
    <script>
        const fi = document.getElementById("fi")
        const en = document.getElementById("en")

        fi.addEventListener("click", () => {
            window.location.href = "/locale/fi"
        })
        en.addEventListener("click", () => {
            window.location.href = "/locale/en"
        })
    </script>
</body>
</html>
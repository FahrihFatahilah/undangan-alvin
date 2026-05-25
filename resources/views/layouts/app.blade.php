<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Wedding of Imah & Alvin</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700&family=Cormorant+Garamond:ital,wght@0,400;0,600;1,400&family=EB+Garamond:ital,wght@0,400;0,500;1,400&family=Great+Vibes&family=Playfair+Display:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#3D0A0F',
                        secondary: '#8B6914',
                        accent: '#5C1018',
                        cream: '#FDF8F0',
                        'text-dark': '#1A0A0A',
                        'text-light': '#FDF8F0',
                        gold: '#A67C00',
                    },
                    fontFamily: {
                        display: ['Great Vibes', 'cursive'],
                        heading: ['Playfair Display', 'serif'],
                        body: ['EB Garamond', 'serif'],
                        label: ['Cinzel', 'serif'],
                        cormorant: ['Cormorant Garamond', 'serif'],
                    }
                }
            }
        }
    </script>

    <link href="https://cdn.jsdelivr.net/npm/glightbox@3.3.0/dist/css/glightbox.min.css" rel="stylesheet">

    <style>
        [x-cloak] { display: none !important; }
        [x-show] { transition: all 0.3s ease; }

        :root {
            --color-primary: #3D0A0F;
            --color-secondary: #8B6914;
            --color-accent: #5C1018;
            --color-bg: #FDF8F0;
        }

        html {
            font-size: 16px;
        }
        @media (min-width: 768px) {
            html { font-size: 17px; }
        }

        body {
            font-family: 'EB Garamond', serif;
            background-color: var(--color-bg);
            color: #1A0A0A;
            overflow-x: hidden;
            font-size: 1rem;
            line-height: 1.7;
        }

        /* Background dengan gambar toile - untuk couple & footer */
        .toile-bg {
            background-color: var(--color-bg);
            background-image: url('/images/toile-bg.png');
            background-size: 100% auto;
            background-position: bottom center;
            background-repeat: no-repeat;
            position: relative;
        }
        .toile-bg::before {
            content: '';
            position: absolute;
            inset: 0;
            background: rgba(253, 248, 240, 0.55);
            pointer-events: none;
        }
        .toile-bg > * {
            position: relative;
            z-index: 1;
        }

        /* Background plain cream dengan SVG pattern - untuk gallery */
        .cream-bg {
            background-color: var(--color-bg);
            background-image: url("data:image/svg+xml,%3Csvg width='80' height='80' viewBox='0 0 80 80' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%238B1A2A' fill-opacity='0.06'%3E%3Cpath d='M50 50c0-5.523 4.477-10 10-10s10 4.477 10 10-4.477 10-10 10c0 5.523-4.477 10-10 10s-10-4.477-10-10 4.477-10 10-10zM10 10c0-5.523 4.477-10 10-10s10 4.477 10 10-4.477 10-10 10c0 5.523-4.477 10-10 10S0 25.523 0 20s4.477-10 10-10zm10 8c4.418 0 8-3.582 8-8s-3.582-8-8-8-8 3.582-8 8 3.582 8 8 8zm40 40c4.418 0 8-3.582 8-8s-3.582-8-8-8-8 3.582-8 8 3.582 8 8 8z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }

        /* Gold shimmer */
        .text-gold-shimmer {
            background: linear-gradient(90deg, #8B6914, #C49A3C, #8B6914);
            background-size: 200% auto;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: shimmer 3s linear infinite;
        }
        @keyframes shimmer {
            0% { background-position: -200% center; }
            100% { background-position: 200% center; }
        }

        /* Envelope */
        .envelope-flap {
            transform-origin: top center;
            transition: transform 0.8s ease-in-out;
        }
        .envelope-flap.open { transform: rotateX(-180deg); }

        /* Music spin */
        @keyframes spin-slow {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
        .animate-spin-slow { animation: spin-slow 3s linear infinite; }

        /* Gold divider */
        .gold-divider {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        .gold-divider::before,
        .gold-divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: linear-gradient(90deg, transparent, #8B6914, transparent);
        }

        /* Scroll Animations - initial state */
        [data-animate] {
            opacity: 0;
            transition: opacity 1s cubic-bezier(0.4, 0, 0.2, 1), transform 1s cubic-bezier(0.4, 0, 0.2, 1);
        }
        [data-animate="fade-up"] { transform: translateY(50px); }
        [data-animate="fade-down"] { transform: translateY(-50px); }
        [data-animate="fade-right"] { transform: translateX(-50px); }
        [data-animate="fade-left"] { transform: translateX(50px); }
        [data-animate="zoom-in"] { transform: scale(0.85); }

        /* Visible state */
        [data-animate].animate-visible {
            opacity: 1 !important;
            transform: translateY(0) translateX(0) scale(1) !important;
        }

        /* Stagger delays */
        [data-delay="100"] { transition-delay: 0.1s; }
        [data-delay="200"] { transition-delay: 0.2s; }
        [data-delay="300"] { transition-delay: 0.3s; }
        [data-delay="400"] { transition-delay: 0.4s; }
        [data-delay="500"] { transition-delay: 0.5s; }
        [data-delay="600"] { transition-delay: 0.6s; }

        /* Petals */
        .petal {
            position: fixed;
            width: 12px;
            height: 12px;
            background: var(--color-secondary);
            opacity: 0.3;
            border-radius: 50% 0 50% 0;
            pointer-events: none;
            animation: fall linear infinite;
            z-index: 1;
        }
        @keyframes fall {
            0% { transform: translateY(-10vh) rotate(0deg); opacity: 0.4; }
            100% { transform: translateY(110vh) rotate(720deg); opacity: 0; }
        }

        /* Scrollbar */
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: var(--color-bg); }
        ::-webkit-scrollbar-thumb { background: var(--color-secondary); border-radius: 3px; }
    </style>
</head>
<body>
    @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/glightbox@3.3.0/dist/js/glightbox.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.8/dist/cdn.min.js"></script>

    @yield('scripts')
</body>
</html>

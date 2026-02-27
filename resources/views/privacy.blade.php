<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YouZoo | Home</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            darkMode: 'class',
        }
    </script>
      <style>
        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }
        .scrollbar-hide {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
    <style>
        body { font-family: 'Montserrat', sans-serif; }
        .glass {
            background: rgba(153, 207, 148, 0.7);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(1px);
            border: 1px solid rgba(255, 255, 255, 0.18);
        }
        .dark .glass {
            background: rgba(39, 90, 47, 0.7);
            border: 1px solid rgba(255, 255, 255, 0.05);
        }
    </style>
    <script>
        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark')
        } else {
            document.documentElement.classList.remove('dark')
        }

        function toggleDarkMode() {
            if (document.documentElement.classList.contains('dark')) {
                document.documentElement.classList.remove('dark');
                localStorage.theme = 'light';
            } else {
                document.documentElement.classList.add('dark');
                localStorage.theme = 'dark';
            }
        }
    </script>
</head>
<body class="bg-gradient-to-br from-green-50 to-blue-50 dark:bg-[#142624] dark:bg-none min-h-screen text-gray-800 dark:text-gray-100 transition-colors duration-300">

<!-- NAV -->
<!-- NAV -->
@include('partials.navbar')

<h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">Privacy Policy</h3>
<p>



At Yoozoo, we respect and value your privacy. This Privacy Policy outlines how we collect, use, and protect your personal information when you visit our website or use our services.

<h4 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">Information We Collect</h4>

We may collect various types of information when you interact with our organisation. This includes personal information, such as your name, email address, and payment details.

<h4 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">How We Use Your Information</h4>

The information we collect is used to provide and improve our services, communicate with you, process transactions, and monitor and analyze usage and trends. We may also use your data to comply with legal obligations

<h4 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">Sharing Your Information</h4>

We do not sell, trade, or rent your personal information to third parties. However, we may share your information with third-party service providers who assist us in operating our website or services, such as payment processors. Additionally, we may disclose your information if required by law or to protect our rights, property, or the safety of our users.

<h4 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">Data Security</h4>

We take reasonable precautions to safeguard your personal information from unauthorized access, loss, or alteration. However, please note that no data transmission method or electronic storage is completely secure, and we cannot guarantee absolute security.

<h4 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">Your Rights and Choices</h4>

You have the right to access and update your personal information, request its deletion, and opt-out of receiving marketing communications by following the unsubscribe instructions in the emails we send.
  
</p>




<!-- FOOTER -->
@include('partials.footer')

</body>
</html>
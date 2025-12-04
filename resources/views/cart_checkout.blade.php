<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cart Checkout</title>
        @vite(['resources/css/app.css','resources/js/cart_checkout.js'])
    </head>
    <body class="bg-white flex flex-col h-full">
        
        <header class="flex justify-between items-center h-12 w-full p-3 bg-green-primary dark:bg-black ">

            <!-- Logo -->
            <div class="flex gap-2 items-center text-white font-bold">
                <img src="{{ asset('/images/Logo.jpg') }}" alt="Logo" class="h-11 w-auto rounded-3xl"/>
                <p> YOUZOO </p>
            </div>

            <!-- Navigation -->
            <nav>
                    <ul class="flex gap-2.5 font-bold text-white" > <!-- TODO. Insert href links -->
                    <li><a class=" hover:text-orange-primary" href="x">Home</a></li>
                    <li><a class=" hover:text-orange-primary" href="x">Shop</a></li>
                    <li><a class=" hover:text-orange-primary" href="x">About</a></li>
                    <li><a class=" hover:text-orange-primary" href="x">Contact</a></li>
                    <li><a class=" hover:text-orange-primary" href="x">Login</a></li>
                </ul>
            </nav>
        
        </header>

        <!-- Menu Tab for small screens -->
        <div id="menu" class="mt-12 w-[20%] flex flex-col items-center p-5 bg-green-primary text-white fixed right-0" hidden>
            <nav>
                <ul class="flex w-full h-full flex-col gap-2.5 font-bold text-white" > <!-- TODO. Insert href links -->
                    <li><a class=" hover:text-beige-third" href="x">Home</a></li>
                    <li><a class=" hover:text-beige-third" href="x">Shop</a></li>
                    <li><a class=" hover:text-beige-third" href="x">About</a></li>
                    <li><a class=" hover:text-beige-third" href="x">Contact</a></li>
                    <li><a name="cart2" class="text-beige-third" href="/cart_checkout">Cart</a></li>
                    <li><a class=" hover:text-beige-third" href="x">Login</a></li>
                </ul>
            </nav>
        </div>

        <main class="flex flex-col items-center w-full gap-5 justify-evenly">

            <div class="flex flex-col items-center">

                <!-- Your Cart Header -->
                <h1 class="font-bold text-4xl text-green-secondary mt-5">YOUR CART</h1>
                
                <!-- Secondary Navigation -->
                <nav>
                    <ul class="flex font-bold text-black items-center" > <!-- TODO. Insert href links -->
                        <li><a class="after:content-['›'] after:mx-3 hover:text-orange-primary " href="x">Home</a></li>
                        <li><a class="hover:text-orange-primary " href="x">Cart</a></li>
                    </ul>
                </nav>

            </div>

            <section class="w-full p-5 items-center bg-beige-primary gap-5 flex flex-col max-h-[40%]">
                <h2 class="text-2xl font-bold text-green-secondary text-center"> PRODUCT LIST SECTION </h2>
                
                <div id="productlist" class="w-full p-5 items-center bg-beige-primary gap-5 max-h-[80%] overflow-y-scroll">
                    <hr class=" border-green-secondary border-[1.5px] w-full h-0.5">

                </div>
            </section>

            <!-- Cart Summary Header -->
            <h1 class="font-bold text-4xl text-green-secondary "> CART SUMMARY </h1>

            <section class="w-full p-5 items-center bg-beige-primary gap-3 flex flex-col">

                <article class="flex w-full items-center justify-between">
                    <div class="flex flex-col gap-3">
                        <h3 class="text-3xl font-bold text-green-secondary"> Subtotal: </h3>
                        <h3 class="text-3xl font-bold text-green-secondary"> Delivery: </h3>
                    </div>
                    <div class="flex flex-col gap-3 items-end">
                        <h3 id="subtotalprice" class=" before:content-['£'] before:mr-1 text-3xl font-bold text-green-secondary">00.00</h3>
                        <h3 id="delivery" class=" before:content-['£'] before:mr-1 after:content-['(est)'] after:ml-1 text-3xl font-bold text-green-secondary">xx.xx</h3>
                    </div>
                </article>

                <hr class=" border-green-secondary border-[1.5px] w-full h-0.5">

                <div class="flex justify-between w-full">
                    <h3 class=" text-3xl font-bold text-green-secondary"> Price: </h3>
                    <h3 id="total" class="before:content-['£'] before:mr-1 text-3xl font-bold text-green-secondary"> £ 00.00 </h3>
                </div>
            </section>

            <!-- Proceed to check out -->
            <button class="p-2 px-9 rounded-[10px] bg-orange-primary text-white text-[28px] font-medium hover:bg-green-secondary -mt-3 mb-2"> Proceed to Check out </button>
                
        </main>
        
        <footer class="flex items-center h-12 w-full bg-green-primary dark:bg-black px-4">
            
            <!-- Logo -->
            <div id="logofooter" class="flex gap-2 items-center justify-start text-white font-bold w-[calc(100%/3)]">
                <img src="{{ asset('/images/Logo.jpg') }}" alt="Logo" class="h-11 w-auto rounded-3xl"/> <!-- Logo -->
                <p> YOUZOO </p>
            </div>

            <!-- Links Navigation -->
            <div id="linksfooter" class="font-bold justify-center items-center text-white flex gap-2 w-[calc(100%/3)]">
                <p> [Links: </p>

                <nav>
                    <ul class="flex gap-1 w-full " > <!-- TODO. Insert href links -->
                        <li><a class="after:content-['|'] after:mx-1 hover:text-orange-primary hover:after:text-white" href="x">About </a></li>
                        <li><a class="after:content-['\|'] after:mx-1 hover:text-orange-primary hover:after:text-white" href="x">Contact</a></li>
                        <li><a class="after:content-['\]'] after:mx-1 hover:text-orange-primary hover:after:text-white" href="x">Policies</a></li>
                    </ul>
                </nav>
            </div>

            <!-- Newspaper Signup Navigation -->
            <div id="newsfooter" class="font-bold text-white items-center justify-end flex gap-2 w-[calc(100%/3)]">
                <p> [Newspaper Signup: </p>

                <nav>
                    <a class=" hover:text-orange-primary after:content-['\]'] hover:after:text-white" href="x">Subscribe</a>  <!-- TODO. Insert href links -->
                </nav>
            </div>
        </footer>

        <div id="placeholderconfig" data-star="{{ asset('images/placeholder5.png') }}" hidden></div>
        <div id="menuconfig" data-star="{{ asset('images/menu1.png') }}" hidden></div>

    </body>
</html>
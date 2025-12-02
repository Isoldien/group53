<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cart Checkout</title>
        @vite(['resources/css/app.css'])
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
                    <li><a name="cart" class=" hover:text-orange-primary" href="x">Cart</a></li>
                    <li><a class=" hover:text-orange-primary" href="x">Login</a></li>
                </ul>
            </nav>
        
        </header>

        <main class="flex flex-col items-center w-full gap-5 flex-1">

            <div class="flex flex-col items-center">

                <!-- Your Cart Header -->
                <h1 class="font-bold text-3xl text-green-secondary mt-5">YOUR CART</h1>
                
                <!-- Secondary Navigation -->
                <nav>
                    <ul class="flex font-bold text-black items-center" > <!-- TODO. Insert href links -->
                        <li><a class="after:content-['›'] after:mx-3 hover:text-orange-primary " href="x">Home</a></li>
                        <li><a class="hover:text-orange-primary " href="x">Cart</a></li>
                    </ul>
                </nav>

            </div>

            <section class="w-full p-5 items-center bg-beige-primary gap-5 flex flex-col">
                <h2 class="text-2xl font-bold text-green-secondary text-center"> PRODUCT LIST SECTION </h2>
                
                <hr class=" border-green-secondary border-[1.5px] w-full h-[2px]">

                <article class="flex w-full items-center gap-5">
                    <img class="h-15 w-auto" src="{{asset('/images/placeholder5.png')}}"/>

                    <div class="flex flex-col gap-2 w-full">
                        <div class="flex w-full justify-between">
                            <h3 class="text-[20px] font-bold text-green-secondary"> Product Name </h3>
                            <button> Remove </button>
                        </div>

                        <div class="flex gap-3">
                            <h3 class="text-[20px] font-bold text-green-secondary"> £ Price</h3>
                            <div class="flex gap-1">
                                <input type="button" name="decrease" value="-" class="w-5 m-0">
                                <input type="number" name="quantity" min="0" value="0" class="w-10 font-bold text-center [&::-webkit-inner-spin-button]:appearance-none [&::-webkit-outer-spin-button]:appearance-none"> <!-- PHP insertion. Dynamically change the max quantity of the product [available items should decrease if added to cart (even if not bought yet) ] -->
                                <input type="button" name="increase" value="+" class="w-5 m-0">
                            </div>
                        </div>

                    </div>
                </article>

                <hr class=" border-green-secondary border-[1.5px] w-full h-[2px]">

                <!-- TODO Create new product article js -->

            </section>

            <!-- Cart Summary Header -->
            <h1 class="font-bold text-3xl text-green-secondary "> CART SUMMARY </h1>

            <section class="w-full p-5 items-center bg-beige-primary gap-3 flex flex-col">

                <article class="flex w-full items-center justify-between">
                    <div class="flex flex-col gap-3">
                        <h3 class="text-3xl font-bold text-green-secondary"> Subtotal: </h3>
                        <h3 class="text-3xl font-bold text-green-secondary"> Delivery: </h3>
                    </div>
                    <div class="flex flex-col gap-3 items-end">
                        <h3 class=" text-3xl font-bold text-green-secondary"> £ 00.00 </h3>
                        <h3 class="text-3xl font-bold text-green-secondary"> £ xx.xx (est) </h3>
                    </div>
                </article>

                <hr class=" border-green-secondary border-[1.5px] w-full h-[2px]">

                <div class="flex justify-between w-full">
                    <h3 class=" text-3xl font-bold text-green-secondary"> Price: </h3>
                    <h3 class="text-3xl font-bold text-green-secondary"> £ 00.00 </h3>
                </div>
            </section>

            <!-- Proceed to check out -->
            <button class="p-1.5 px-8 rounded-[10px] bg-orange-primary text-white text-[24px] font-medium hover:bg-green-secondary"> Proceed to Check out </button>
                
        </main>
        
        <footer class="grid grid-cols-3 items-center h-12 w-full mt-10 bg-green-primary dark:bg-black px-4">
            
            <!-- Logo -->
            <div class="flex gap-2 items-center text-white font-bold">
                <img src="{{ asset('/images/Logo.jpg') }}" alt="Logo" class="h-11 w-auto rounded-3xl"/> <!-- Logo -->
                <p> YOUZOO </p>
            </div>

            <!-- Links Navigation -->
            <div class="font-bold justify-center items-center text-white flex gap-2">
                <p> [Links: </p>

                <nav>
                    <ul class="flex gap-1 " > <!-- TODO. Insert href links -->
                        <li><a class="after:content-['|'] after:mx-1 hover:text-orange-primary hover:after:text-white" href="x">About </a></li>
                        <li><a class="after:content-['\|'] after:mx-1 hover:text-orange-primary hover:after:text-white" href="x">Contact</a></li>
                        <li><a class="after:content-['\]'] after:mx-1 hover:text-orange-primary hover:after:text-white" href="x">Policies</a></li>
                    </ul>
                </nav>
            </div>

            <!-- Newspaper Signup Navigation -->
            <div class="font-bold text-white items-center justify-end flex gap-2">
                <p> [Newspaper Signup: </p>

                <nav>
                    <a class=" hover:text-orange-primary after:content-['\]'] hover:after:text-white" href="x">Subscribe</a>  <!-- TODO. Insert href links -->
                </nav>
            </div>
        </footer>
        
    </body>
</html>
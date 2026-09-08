<?php

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finway - Best Financial Solutions</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        themePurple: '#5950C2',
                        themePurpleDark: '#483FB1',
                        themeGold: '#EAA945',
                        themeBg: '#EEF0F5',
                    }
                }
            }
        }
    </script>
    <script src="https://unpkg.com/htmx.org@1.9.10"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&display=swap');
        body { font-family: 'Montserrat', sans-serif; }
    </style>
</head>
<body class="bg-white min-h-screen text-gray-800 antialiased overflow-x-hidden">

    <div id="mobile-menu" class="hidden fixed inset-0 z-50 bg-slate-900/80 backdrop-blur-sm lg:hidden">
        <div class="bg-white w-72 h-full p-6 flex flex-col justify-between shadow-2xl">
            <div class="space-y-6">
                <div class="flex justify-between items-center border-b pb-4">
                    <div class="flex items-center space-x-2">
                        <svg class="w-5 h-5 text-themePurple fill-current" viewBox="0 0 24 24"><path d="M4 2l16 10L4 22V2z"/></svg>
                        <span class="text-base font-extrabold text-gray-900 tracking-wider">FINWAY</span>
                    </div>
                    <button class="text-gray-500 text-xl font-bold p-1" 
                            hx-on:click="document.getElementById('mobile-menu').classList.add('hidden')">&times;</button>
                </div>
                
                <nav class="flex flex-col space-y-4 text-xs font-bold text-gray-700 uppercase tracking-wider">
                    <a href="#" class="text-themePurple">Home</a>
                    <a href="#" class="hover:text-themePurple transition">About Us</a>
                    <a href="#" class="hover:text-themePurple transition">Services</a>
                    <a href="#" class="hover:text-themePurple transition">Cases</a>
                    <a href="#" class="hover:text-themePurple transition">Contacts</a>
                </nav>
            </div>

            <div class="space-y-2 border-t pt-4 text-[11px] text-gray-500">
                <p>📍 9 Valley St. Brooklyn, NY 11203</p>
                <p>📞 1-800-346-6277</p>
            </div>
        </div>
    </div>

    <header class="w-full bg-white border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-6 lg:px-12 py-4 flex justify-between items-center">
            
            <div class="flex items-center space-x-2">
                <svg class="w-6 h-6 text-themePurple fill-current" viewBox="0 0 24 24">
                    <path d="M4 2l16 10L4 22V2z"/>
                </svg>
                <span class="text-xl font-black text-gray-900 tracking-wider">FINWAY</span>
            </div>

            <nav class="hidden lg:flex items-center space-x-8 text-xs font-bold text-gray-700 uppercase tracking-wider">
                <a href="#" class="text-themePurple border-b-2 border-themePurple pb-1">Home</a>
                <a href="#" class="hover:text-themePurple transition">About Us</a>
                <a href="#" class="hover:text-themePurple transition">Services</a>
                <a href="#" class="hover:text-themePurple transition">Cases</a>
                <a href="#" class="hover:text-themePurple transition">Contacts</a>
            </nav>

            <div class="hidden lg:flex items-center space-x-8 text-xs font-medium text-gray-600">
                <div class="flex items-center space-x-2">
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    <span>9 Valley St. Brooklyn, NY 11203</span>
                </div>
                <div class="flex items-center space-x-2">
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                    <span>1-800-346-6277</span>
                </div>
            </div>

            <button class="lg:hidden bg-themePurple text-white px-4 py-2 text-xs font-bold uppercase tracking-wider flex items-center space-x-1"
                    hx-on:click="document.getElementById('mobile-menu').classList.remove('hidden')">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                <span>Menu</span>
            </button>
        </div>
    </header>

    <section class="w-full bg-themeBg relative py-12 lg:py-24">
        <div class="max-w-7xl mx-auto px-6 lg:px-12 grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
            
            <div class="lg:col-span-6 space-y-6">
                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black text-gray-900 leading-tight tracking-tight">
                    BEST FINANCIAL<br>SOLUTIONS
                </h1>
                
                <div class="flex items-center space-x-3">
                    <span class="w-8 h-[3px] bg-themeGold"></span>
                    <span class="text-sm font-bold text-gray-800 uppercase tracking-wide">for your Business</span>
                </div>

                <p class="text-xs sm:text-sm text-gray-500 max-w-md leading-relaxed">
                    Finway provides quality financial advisory services to businesses located all over the USA.
                </p>

                <div class="pt-2">
                    <button class="bg-themePurple hover:bg-themePurpleDark text-white text-xs font-bold px-8 py-3.5 uppercase tracking-wider transition shadow-sm">
                        Read More
                    </button>
                </div>
            </div>

            <div class="lg:col-span-6 relative">
                <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&q=80&w=1200" 
                     alt="Financial Advisory Team" 
                     class="w-full h-[300px] sm:h-[400px] object-cover object-top rounded-sm shadow-md">
            </div>
        </div>
    </section>

    <main class="w-full bg-white relative pb-16">
        <div class="max-w-7xl mx-auto px-6 lg:px-12 grid grid-cols-1 lg:grid-cols-12 gap-12 pt-12">
            
            <div class="lg:col-span-7 space-y-8">
                <div class="flex justify-between items-center">
                    <h2 class="text-2xl font-bold text-gray-900">What We Offer</h2>
                    <button class="text-xs border border-gray-200 px-4 py-1.5 font-semibold text-gray-600 hover:bg-gray-50 uppercase tracking-wider">
                        View All
                    </button>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div class="relative h-48 group overflow-hidden bg-gray-900 rounded-sm">
                        <img src="https://images.unsplash.com/photo-1554224155-8d04cb21cd6c?auto=format&fit=crop&q=80&w=600" alt="Financial Planning" class="w-full h-full object-cover opacity-80 group-hover:scale-105 transition duration-300">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent p-5 flex flex-col justify-end">
                            <h3 class="text-white font-bold text-sm">Financial Planning</h3>
                            <p class="text-xs text-gray-300 mt-1 leading-tight">We provide quality financial planning solutions.</p>
                        </div>
                    </div>

                    <div class="relative h-48 group overflow-hidden bg-gray-900 rounded-sm">
                        <img src="https://images.unsplash.com/photo-1551836022-d5d88e9218df?auto=format&fit=crop&q=80&w=600" alt="Business Modelling" class="w-full h-full object-cover opacity-80 group-hover:scale-105 transition duration-300">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent p-5 flex flex-col justify-end">
                            <h3 class="text-white font-bold text-sm">Business Modelling</h3>
                        </div>
                    </div>

                    <div class="relative h-48 group overflow-hidden bg-gray-900 rounded-sm">
                        <img src="https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?auto=format&fit=crop&q=80&w=600" alt="Investment Management" class="w-full h-full object-cover opacity-80 group-hover:scale-105 transition duration-300">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent p-5 flex flex-col justify-end">
                            <h3 class="text-white font-bold text-sm">Investment Management</h3>
                        </div>
                    </div>

                    <div class="relative h-48 group overflow-hidden bg-gray-900 rounded-sm">
                        <img src="https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?auto=format&fit=crop&q=80&w=600" alt="Strategic Planning" class="w-full h-full object-cover opacity-80 group-hover:scale-105 transition duration-300">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent p-5 flex flex-col justify-end">
                            <h3 class="text-white font-bold text-sm">Strategic Planning</h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-5 lg:-mt-40 z-20 space-y-8">
                
                <div class="bg-white p-8 shadow-2xl border border-gray-100 rounded-sm">
                    <h3 class="text-sm font-semibold text-gray-800 mb-6">Make an appointment</h3>

                    <form hx-post="/api/appointment" hx-target="#form-response" hx-swap="innerHTML" class="space-y-6">
                        <div id="form-response"></div>

                        <div class="relative border-b border-gray-200 focus-within:border-themePurple pb-1">
                            <span class="absolute left-0 top-1.5 text-gray-400">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                            </span>
                            <input type="text" name="name" placeholder="Name" required class="w-full pl-7 text-xs text-gray-700 bg-transparent focus:outline-none placeholder-gray-400 py-1">
                        </div>

                        <div class="relative border-b border-gray-200 focus-within:border-themePurple pb-1">
                            <span class="absolute left-0 top-1.5 text-gray-400">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            </span>
                            <input type="email" name="email" placeholder="E-mail" required class="w-full pl-7 text-xs text-gray-700 bg-transparent focus:outline-none placeholder-gray-400 py-1">
                        </div>

                        <div class="relative border-b border-gray-200 focus-within:border-themePurple pb-1">
                            <span class="absolute left-0 top-1.5 text-gray-400">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            </span>
                            <input type="tel" name="phone" placeholder="Phone" required class="w-full pl-7 text-xs text-gray-700 bg-transparent focus:outline-none placeholder-gray-400 py-1">
                        </div>

                        <button type="submit" class="w-full bg-themePurple hover:bg-themePurpleDark text-white text-xs font-bold py-3.5 uppercase tracking-wider transition mt-2">
                            Send Request
                        </button>
                    </form>
                </div>

                <div class="pt-2">
                    <h4 class="text-sm font-bold text-gray-900">Company Presentation</h4>
                    <p class="text-xs text-gray-400 mt-1">Watch this presentation to know more about us.</p>
                    <a href="#" class="inline-block mt-3 text-xs font-bold text-themePurple border-b-2 border-themePurple pb-0.5 hover:text-themePurpleDark uppercase tracking-wider">
                        Download & Watch
                    </a>
                </div>
            </div>

        </div>
    </main>

</body>
</html>
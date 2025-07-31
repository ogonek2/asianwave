<template>
    <section class="Jury pf cyber-razor-top bg-dark fg-white p-3">
        <div class="container">
            <div class="content swiper-container">
                <div class="text">
                    <h1 class="t-t-h">
                        Журі
                    </h1>
                </div>
                <div class="swiper-wrapper group-items">
                    <div class="item swiper-slide">
                        <div class="avatar">
                            <img src="/storage/source/organizers/photo_2023-11-15_21-05-56.jpg" alt="">
                        </div>
                        <div class="author-info">
                            <small><b>Організатор</b></small>
                            <h1>Nadia Moon</h1>
                            <div class="about-tt">
                                <p>
                                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Omnis deserunt saepe eos
                                    dolor
                                    ipsam, ducimus voluptas, corrupti nisi, temporibus dolorum necessitatibus hic
                                    molestias
                                    autem vero incidunt. Laboriosam sapiente error unde.
                                </p>
                            </div>
                            <div class="sl">
                                <a href="#"><i class="fa-brands fa-instagram"></i></a>
                                <a href="#"><i class="fa-brands fa-facebook"></i></a>
                                <a href="#"><i class="fa-brands fa-pinterest"></i></a>
                                <a href="#"><i class="fa-brands fa-twitter"></i></a>
                                <a href="#"><i class="fa-brands fa-linkedin"></i></a>
                                <a href="#"><i class="fa-brands fa-tiktok"></i></a>
                                <a href="#"><i class="fa-brands fa-youtube"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="item swiper-slide">
                        <div class="avatar">
                            <img src="/storage/source/organizers/photo_2023-11-15_21-05-56.jpg" alt="">
                        </div>
                        <div class="author-info">
                            <small><b>Організатор</b></small>
                            <h1>Nadia Moon</h1>
                            <div class="about-tt">
                                <p>
                                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Omnis deserunt saepe eos
                                    dolor
                                    ipsam, ducimus voluptas, corrupti nisi, temporibus dolorum necessitatibus hic
                                    molestias
                                    autem vero incidunt. Laboriosam sapiente error unde.
                                </p>
                            </div>
                            <div class="sl">
                                <a href="#"><i class="fa-brands fa-instagram"></i></a>
                                <a href="#"><i class="fa-brands fa-facebook"></i></a>
                                <a href="#"><i class="fa-brands fa-pinterest"></i></a>
                                <a href="#"><i class="fa-brands fa-twitter"></i></a>
                                <a href="#"><i class="fa-brands fa-linkedin"></i></a>
                                <a href="#"><i class="fa-brands fa-tiktok"></i></a>
                                <a href="#"><i class="fa-brands fa-youtube"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="item swiper-slide">
                        <div class="avatar">
                            <img src="/storage/source/organizers/photo_2023-11-15_21-05-56.jpg" alt="">
                        </div>
                        <div class="author-info">
                            <small><b>Організатор</b></small>
                            <h1>Nadia Moon</h1>
                            <div class="about-tt">
                                <p>
                                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Omnis deserunt saepe eos
                                    dolor
                                    ipsam, ducimus voluptas, corrupti nisi, temporibus dolorum necessitatibus hic
                                    molestias
                                    autem vero incidunt. Laboriosam sapiente error unde.
                                </p>
                            </div>
                            <div class="sl">
                                <a href="#"><i class="fa-brands fa-instagram"></i></a>
                                <a href="#"><i class="fa-brands fa-facebook"></i></a>
                                <a href="#"><i class="fa-brands fa-pinterest"></i></a>
                                <a href="#"><i class="fa-brands fa-twitter"></i></a>
                                <a href="#"><i class="fa-brands fa-linkedin"></i></a>
                                <a href="#"><i class="fa-brands fa-tiktok"></i></a>
                                <a href="#"><i class="fa-brands fa-youtube"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="item swiper-slide">
                        <div class="avatar">
                            <img src="/storage/source/organizers/photo_2023-11-15_21-05-56.jpg" alt="">
                        </div>
                        <div class="author-info">
                            <small><b>Організатор</b></small>
                            <h1>Nadia Moon</h1>
                            <div class="about-tt">
                                <p>
                                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Omnis deserunt saepe eos
                                    dolor
                                    ipsam, ducimus voluptas, corrupti nisi, temporibus dolorum necessitatibus hic
                                    molestias
                                    autem vero incidunt. Laboriosam sapiente error unde.
                                </p>
                            </div>
                            <div class="sl">
                                <a href="#"><i class="fa-brands fa-instagram"></i></a>
                                <a href="#"><i class="fa-brands fa-facebook"></i></a>
                                <a href="#"><i class="fa-brands fa-pinterest"></i></a>
                                <a href="#"><i class="fa-brands fa-twitter"></i></a>
                                <a href="#"><i class="fa-brands fa-linkedin"></i></a>
                                <a href="#"><i class="fa-brands fa-tiktok"></i></a>
                                <a href="#"><i class="fa-brands fa-youtube"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </section>
</template>


<script>
import Swiper from 'swiper/bundle';
import 'swiper/css/bundle';

export default {
    name: 'Organizers',
    mounted() {
        this.initSwiper();
    },
    methods: {
        initSwiper() {
            new Swiper('.swiper-container', {
                slidesPerView: 1,
                spaceBetween: 20,
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
            });
        }
    }
}
</script>
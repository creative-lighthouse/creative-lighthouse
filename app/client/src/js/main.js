import Swiper, {Autoplay, EffectCoverflow, EffectFade, Navigation, Pagination} from 'swiper';
import GLightbox from "glightbox";
import * as THREE from 'three';

import { OrbitControls } from 'three/addons/controls/OrbitControls.js';

document.addEventListener("DOMContentLoaded", function (event) {

    const menu_button = document.querySelector('[data-behaviour="toggle-menu"]');

    menu_button.addEventListener('click', () => {
        document.body.classList.toggle('body--show');
    })

    const lightbox = GLightbox({
        selector: '[data-gallery="gallery"]',
        touchNavigation: true,
        loop: true,
    });

    const sliders = document.querySelectorAll('.swiper');

    // init Swiper:
    sliders.forEach(function (slider) {
        const autoSwiper = slider.classList.contains('swiper--auto');
        const swiper = new Swiper(slider, {
            // configure Swiper to use modules
            modules: [Navigation, Autoplay, EffectFade],
            effect: 'fade',
            fadeEffect: {
                crossFade: true
            },
            direction: 'horizontal',
            loop: autoSwiper,

            autoplay: autoSwiper ? {
                delay: 5000,
            } : false,

            // Navigation arrows
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });

    });

    const modelViewers = document.querySelectorAll('.model-viewer');
    if(modelViewers.length > 0) {
        modelViewers.forEach(function (modelViewer) {
            const scene = new THREE.Scene();
            const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
            const renderer = new THREE.WebGLRenderer( { alpha: true } );
            renderer.setSize(modelViewer.offsetWidth, modelViewer.offsetHeight);
            modelViewer.appendChild(renderer.domElement);

            const controls = new OrbitControls( camera, renderer.domElement );
            controls.enableZoom = false;

            const textureLoader = new THREE.TextureLoader();
            const diffuseMap = textureLoader.load(modelViewer.dataset.diffuse);
            const normalMap = textureLoader.load(modelViewer.dataset.normal);
            const displacementMap = textureLoader.load(modelViewer.dataset.displacement);
            const ambientOcclusionMap = textureLoader.load(modelViewer.dataset.ao);

            const cube = new THREE.Mesh(
                new THREE.BoxGeometry(1,1,1,64,64,64),
                new THREE.MeshStandardMaterial({
                    map: diffuseMap,
                    normalMap: normalMap,
                    normalScale: new THREE.Vector2(1, 1),
                    displacementMap: displacementMap,
                    displacementScale: 0.07,
                    displacementBias: -0.05,
                    color: 0xffffff,
                    roughness: 0.8,
                    metalness: 0.2,
                    aoMap: ambientOcclusionMap,
                    aoMapIntensity: 1,
                })
            );
            scene.add(cube);

            const light = new THREE.SpotLight(0xffffff, 1);
            scene.add(light);

            camera.position.set( 0, 1, 1);
            controls.update();

            function animate() {
                requestAnimationFrame( animate );
                cube.rotation.x += 0.001;
                cube.rotation.y += 0.001;
                controls.update();
                light.position.set( camera.position.x, camera.position.y, camera.position.z );
                light.direction = camera.direction;
                renderer.render( scene, camera );
            }
            animate();
        });


    }
});

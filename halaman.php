<style style="text/css">
.jumbotron {
    background-color : white;
}
.scroll-left {
/* the height is just set to the height of my region. not sure if this is 
    needed? */
height: 78px; 	
 overflow: hidden;
 position: relative;
 /* I'm using the transparent background as this is in an overlay layout */
 background: transparent;
 color: #000000;
}
.scroll-left h1 {
 position: absolute;
 width: 100%;
 height: 100%;
 margin: 0;
 text-align: center;
 /* Starting position */
 -moz-transform:translateX(100%);
 -webkit-transform:translateX(100%);	
 transform:translateX(100%);
 /* Apply animation to this element */	
 -moz-animation: scroll-left 20s linear infinite;
 -webkit-animation: scroll-left 20s linear infinite;
 animation: scroll-left 20s linear infinite;
}
/* Move it (define the animation) */
@-moz-keyframes scroll-left {
 0%   { -moz-transform: translateX(100%); }
 100% { -moz-transform: translateX(-100%); }
}
@-webkit-keyframes scroll-left {
 0%   { -webkit-transform: translateX(100%); }
 100% { -webkit-transform: translateX(-100%); }
}
@keyframes scroll-left {
 0%   { 
 -moz-transform: translateX(100%); /* Browser bug fix */
 -webkit-transform: translateX(100%); /* Browser bug fix */
 transform: translateX(100%); 		
 }
 100% { 
 -moz-transform: translateX(-100%); /* Browser bug fix */
 -webkit-transform: translateX(-100%); /* Browser bug fix */
 transform: translateX(-100%); 
 }
}

@media only screen and (max-width: 800px) {
    .scroll-left {
        height:180px;
    }
} 

</style>

<div class="jumbotron">
    <div class="scroll-left">
        <!-- <marquee behavior=scroll direction="left" scrollamount="15"><h1>Selamat datang di E-Library v1.0</h1></marquee> -->
        <h1 class="">Selamat datang di E-Library v1.0</h1>
    </div>
    <p class="text-justify" style="margin-top:20px;">Perpustakaan Digital (E-Library) adalah perpustakaan yang mempunyai koleksi buku sebagian besar dalam bentuk format digital dan yang bisa diakses dengan komputer. Jenis perpustakaan ini berbeda dengan jenis perpustakaan konvensional yang berupa kumpulan buku tercetak, film mikro (microform dan microfiche), ataupun kumpulan kaset audio, video, dll. Isi dari perpustakaan digital berada dalam suatu komputer server yang bisa ditempatkan secara lokal, maupun di lokasi yang jauh, namun dapat diakses dengan cepat dan mudah lewat jaringan komputer.</p>
    <!-- <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p> -->
</div>
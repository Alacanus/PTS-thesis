<?php

require __DIR__ . '/../src/bootstrap.php';
?>
<?php view('header', ['title' => 'FAQ']); ?>
<main id="mymain1">
    <div class="faq-container">
        <section class="faqsection--1">
            <div class="section--1-content">
                <div class="faq-container">
                    <h2 id="sec-1-title">FAQ</h2>
                    <h3 id="sec-1-title">Catch Phrase</h3>
                </div>
            </div>
        </section>
        <section class="faqsection--2">
            <div class="flex-item--01">
            </div>
            <div class="flex-item--02">
                <h2>What is Personal Tutoring Services?</h2>
                <p>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the 
                    industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and 
                    scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap 
                    into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the 
                    release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing 
                    software like Aldus PageMaker including versions of Lorem Ipsum.
                </p>
            </div>
        </section>
        <section class="faqsection--3">

        </section>
    </div>
</main>
<?php view('footer') ?>
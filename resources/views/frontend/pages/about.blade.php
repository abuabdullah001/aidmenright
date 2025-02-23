<style>
    .foundation-section {
        padding: 20px 20px;
    }

    .foundation-title {
        font-size: 24px;
        font-weight: bold;
        text-align: right;
        color: #177F42;
    }

    .container.foundation-section {
        padding: 60px 50px;
    }

    .foundation-title::after {
        content: '';
        display: block;
        width: 100%;
        height: 2px;
        background-color: #777;
        margin-top: 5px;
        margin-bottom: 20px;
    }

    .foundation-image img {
        border-radius: 50%;
        max-width: 100%;
        height: auto;
    }

    .foundation-text {
        text-align: justify;
        font-size: 16px;
    }

    .foundation-list {
        list-style-type: none;
        padding-left: 0;
    }

    .foundation-list li {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
    }

    .foundation-list li::before {
        content: '●';
        color: #177F42;
        font-size: 20px;
        margin-right: 10px;
    }

    .col-md-6.foundation-image {
        display: flex;
        justify-content: center;
    }
</style>


<div class="apout_us">
    <div class="container foundation-section">
        <div class="row">
            <!-- Image Section -->
            <div class="col-md-6 foundation-image">
                <img src="{{asset('images/golden-gate.jpg')}}" alt="Foundation Image">
            </div>

            <!-- Text Section -->
            <div class="col-md-6">
                <h2 class="foundation-title">আস-সুন্নাহ ফাউন্ডেশন</h2>
                <p class="foundation-text">
                    আস-সুন্নাহ ফাউন্ডেশন একটি অরাজনৈতিক, অলাভজনক শিক্ষা, দাওয়াহ ও পূর্ণ মানবকল্যাণে নিবেদিত সেবামূলক প্রতিষ্ঠান।
                    এই প্রতিষ্ঠান মানবতার শিক্ষা, মানুষের মুক্তি ও শান্তির দীক্ষা, মানবতার আদর্শ, মহানবী মুহাম্মদ (সা.)-এর পথের
                    অনুসরণের আহ্বানে নিবেদিত।
                </p>
                <ul class="foundation-list">
                    <li>শিক্ষা</li>
                    <li>সেবা</li>
                    <li>দাওয়াহ</li>
                </ul>
            </div>
        </div>
    </div>
</div>
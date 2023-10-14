<div>
    <x-breadcumb title="FAQ" />

    <div class="container py-5">
        <x-accordion :data="\App\Constants\Faq::GENERAL" key="general" />
        
        <x-accordion :data="\App\Constants\Faq::BOOKING" key="booking" />

        <x-accordion :data="\App\Constants\Faq::PAYMENT" key="payment" />
    </div>
</div>

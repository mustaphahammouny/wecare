<?php

namespace App\Constants;

abstract class Faq
{
    const GENERAL = [
        'title' => 'General',
        'pairs' => [
            [
                'question' => 'What is our mission?',
                'answer' => 'Our mission is to provide high-quality products and excellent service to our customers.'
            ],
            [
                'question' => 'How can I contact customer support?',
                'answer' => 'You can reach our customer support team by email at support@wecare.com or by phone at +212 123456789.'
            ],
            [
                'question' => 'Do you offer refunds for products?',
                'answer' => 'Yes, we have a refund policy in place. Please review our refund policy for details.'
            ],
            [
                'question' => 'Where are you located?',
                'answer' => 'Our company is headquartered in City, State, and we have multiple branches across the country.'
            ],
        ],
    ];

    const BOOKING = [
        'title' => 'Booking',
        'pairs' => [
            [
                'question' => 'How do I make a booking?',
                'answer' => 'To make a booking, visit our website, select the desired service, and follow the on-screen instructions.'
            ],
            [
                'question' => 'Can I cancel or reschedule a booking?',
                'answer' => 'Yes, you can cancel or reschedule your booking through your user account on our website.'
            ],
            [
                'question' => 'Is there a cancellation fee?',
                'answer' => 'Cancellation fees may apply depending on the timing of the cancellation. Please refer to our terms and conditions for details.'
            ],
            [
                'question' => 'How far in advance can I make a booking?',
                'answer' => 'You can make a booking up to 30 days in advance. Some services may have different booking windows.'
            ],
        ],
    ];

    const PAYMENT = [
        'title' => 'Payment',
        'pairs' => [
            [
                'question' => 'What payment methods do you accept?',
                'answer' => 'We accept credit cards, PayPal, and other secure online payment methods.'
            ],
            [
                'question' => 'Is my payment information secure?',
                'answer' => 'Yes, we use industry-standard encryption to secure your payment information.'
            ],
            [
                'question' => 'Do you offer payment plans?',
                'answer' => 'We offer payment plans for select products and services. Please check the product details for payment plan availability.'
            ],
            [
                'question' => 'Can I change my payment method after making a purchase?',
                'answer' => 'Yes, you can update your payment method in your account settings.'
            ],
        ],
    ];
}

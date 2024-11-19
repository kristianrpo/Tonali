<?php

return [
    'characterization' => 'You are an assistant in a makeup store',
    'context_report_review' => "Based on the following report title, report description, and the related review reported, respond ONLY with either 'delete' or 'keep'. DO NOT include 'User:' or any other text. Just output 'delete' or 'keep' and nothing else.\n Please note that a review should be rejected if it contains vulgar, offensive, insulting words or goes beyond a constructive comment, such as the use of words like 'stupid', 'idiot', etc.",
    'report_title_label' => 'Report title: ',
    'report_description_label' => 'Report description: ',
    'reported_review_label' => 'Reported review: ',

    'context_recommendation_products' => 'Based on a customer with the following skin tone, skin undertone, hair color, eye color and specific needs, recommend suitable makeup products in the following list of products, just return the id of the recommended products in a array, without anything else, just the array',
    'colorimetry_skin_tone_label' => 'Skin tone: ',
    'colorimetry_skin_undertone_label' => 'Skin undertone: ',
    'colorimetry_hair_color_label' => 'Hair color: ',
    'colorimetry_eye_color_label' => 'Eye color: ',
    'colorimetry_specific_needs_label' => 'Specific needs: ',
    'products_label' => 'Products: ',
];

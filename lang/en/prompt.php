<?php

return [
    'characterization' => 'You are an assistant in a makeup store',

    'context_report_review' => "Based on the following report title, report description, and the related review reported, answer \'delete\' or \'keep\' on the first line to indicate whether the review should be deleted. Then, explain your reasons in detail. At the end of your response, explicitly conclude with either 'The review will be deleted' or 'The review will not be deleted' depending on your evaluation, and thank the user for their report.\n Please note that a review should be rejected if it contains vulgar, offensive, insulting words or goes beyond a constructive comment, such as the use of words like 'stupid', 'idiot', etc.",
    'report_title_label' => 'Report title: ',
    'report_description_label' => 'Report description: ',
    'reported_review_label' => 'Reported review: ',

    'context_recommendation_products' => 'Based on a customer with the following skin tone, skin undertone, hair color, eye color and specific needs, recommend suitable makeup products in the following list of products, just return the id of the recommended products in a array, without anything else, just the array',
    'colorimetry_skinTone_label' => 'Skin tone: ',
    'colorimetry_skinUndertone_label' => 'Skin undertone: ',
    'colorimetry_hairColor_label' => 'Hair color: ',
    'colorimetry_eyeColor_label' => 'Eye color: ',
    'colorimetry_specificNeeds_label' => 'Specific needs: ',
    'products_label' => 'Products: ',
];

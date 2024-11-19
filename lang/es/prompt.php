<?php

return [
    'context' => "Basado en el siguiente título del reporte, descripción del reporte y la reseña reportada relacionada,  responde ÚNICAMENTE con 'delete' o 'keep'. NO incluyas 'User:' ni ningún otro texto. Solo devuelve 'delete' o 'keep' y nada más. \n Ten en cuenta que una reseña debe ser rechazada si contiene palabras vulgares, ofensivas, insultantes o si va más allá de un comentario constructivo.",
    'report_title_label' => 'Título del reporte: ',
    'report_description_label' => 'Descripción del reporte: ',
    'reported_review_label' => 'Reseña reportada: ',

    'context_recommendation_products' => 'Basado en un cliente con el siguiente tono de piel, subtono de piel, color de pelo, color de ojos y necesidades específicas, recomendar productos de maquillaje adecuados en la siguiente lista de productos, sólo devolver el id de los productos recomendados en una matriz, sin nada más, sólo la matriz.',
    'colorimetry_skin_tone_label' => 'Tono de piel: ',
    'colorimetry_skin_undertone_label' => 'Subtono de piel: ',
    'colorimetry_hair_color_label' => 'Color de cabello: ',
    'colorimetry_eye_color_label' => 'Color de ojos: ',
    'colorimetry_specific_needs_label' => 'Necesidades específicas: ',
];

<?php

return [
    'context' => "Basado en el siguiente título del reporte, descripción del reporte y la reseña reportada relacionada, responde 'eliminar' o 'mantener' en la primera línea para indicar si la reseña debe ser eliminada. Luego, explica tus razones en detalle. Al final de tu respuesta, concluye explícitamente con 'La reseña será eliminada' o 'La reseña no será eliminada' dependiendo de tu evaluación, y agradece al usuario por su reporte.\n Ten en cuenta que una reseña debe ser rechazada si contiene palabras vulgares, ofensivas, insultantes o va más allá de un comentario constructivo, como el uso de palabras como 'estúpido', 'idiota', etc.",

    'report_title_label' => 'Título del reporte: ',
    'report_description_label' => 'Descripción del reporte: ',
    'reported_review_label' => 'Reseña reportada: ',

    'context_recommendation_products' => 'Basado en un cliente con el siguiente tono de piel, subtono de piel, color de pelo, color de ojos y necesidades específicas, recomendar productos de maquillaje adecuados en la siguiente lista de productos, sólo devolver el id de los productos recomendados en una matriz, sin nada más, sólo la matriz.',
    'colorimetry_skinTone_label' => 'Tono de piel: ',
    'colorimetry_skinUndertone_label' => 'Subtono de piel: ',
    'colorimetry_hairColor_label' => 'Color de cabello: ',
    'colorimetry_eyeColor_label' => 'Color de ojos: ',
    'colorimetry_specificNeeds_label' => 'Necesidades específicas: ',
];

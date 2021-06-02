<?php


namespace App\Docs;


class InitSwagger {

    /**
     * @OA\Info(
     *      version="1.0.0",
     *      title="Documentación de funciones",
     *      description="Documentación de funciones de 10code template",
     *
     *      @OA\Contact(
     *          email="info@10code.es"
     *      ),
     *     @OA\License(
     *         name="Apache 2.0",
     *         url="http://www.apache.org/licenses/LICENSE-2.0.html"
     *     )
     * )
     */

    /**
     *  @OA\Server(
     *      url=L5_SWAGGER_CONST_HOST,
     *      description="L5 Swagger OpenApi dynamic host server"
     *  )
     */

    /**
     * @OA\SecurityScheme(
     *     type="http",
     *     description="Adjuntar token devuelto en el login para poder realizar peticiones",
     *     name="Password Based",
     *     in="header",
     *     scheme="bearer",
     *     bearerFormat="JWT",
     *     securityScheme="bearerAuth"
     * )
     */

}
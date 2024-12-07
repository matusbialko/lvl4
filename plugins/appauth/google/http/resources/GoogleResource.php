<?php namespace AppAuth\Google\Http\Resources;

    use Illuminate\Http\Resources\Json\JsonResource;
    use LibUser\Userapi\Http\Resources\UserResource;

    class GoogleResource extends JsonResource {

        public function toArray($request) {
            return [
                "id" => $this->id
            ];
        }
        
    }
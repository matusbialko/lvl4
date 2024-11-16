<?php namespace AppAuth\Auth\Http\Resources;

    use Illuminate\Http\Resources\Json\JsonResource;
    use LibUser\Userapi\Http\Resources\UserResource;

    class ArrivalResource extends JsonResource {

        public function toArray($request) {
            return [
                "id" => $this->id
            ];
        }
        
    }
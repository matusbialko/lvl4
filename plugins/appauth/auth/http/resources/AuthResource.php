<?php namespace AppAuth\Auth\Http\Resources;

    use Illuminate\Http\Resources\Json\JsonResource;

    class AuthResource extends JsonResource {

        public function toArray($request) {
            return [
                "id" => $this->id,
                "username" => $this->username,
                "email" => $this->email,
                "created_at" => $this->created_at,
            ];
        }
        
    }
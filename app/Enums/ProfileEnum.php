<?php

namespace App\Enums;

enum ProfileEnum: int
{
  case ADMIN = 1;
  case MANAGER = 2;
  case COLLABORATOR = 3;
}

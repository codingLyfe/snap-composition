<?php


trait Brake {
	public function brake() : void {
		echo "unlike a lot of Burquenos, I stop for red lights" . PHP_EOL;
	}
}

class Vehicle {

	protected $plateNo;

	public function __construct(string $newPlateNo) {
		try {
			$this->setPlateNo($newPlateNo);
		} catch(\InvalidArgumentException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}
	}

	public function getPlateNo(): string {
		return ($this->plateNo);
	}

	public function setPlateNo($newPlateNo): void {
		$newPlateNo = filter_var($newPlateNo, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		$newPlateNo = strtoupper($newPlateNo);

		// ^ means beginning
		// \d === [0-9]
		if(preg_match("/^[A-Z]{3}\d{3}$/", $newPlateNo) !== 1) {
			throw(new InvalidArgumentException("bad plate number"));
		}
		$this->plateNo = $newPlateNo;

	}
}

class ParadeFloat extends Vehicle {
		use Brake;

		protected $isGettingAwayVerySlowly;

		public function __construct($newIsGettingAwayVerySlowly, string $newPlateNo) {
			try {
				// java uses super($newPlateNo);    this will be useful in angularf
				parent::__construct($newPlateNo);
				$this->setIsGettingAwayVerySlowly($newIsGettingAwayVerySlowly);
			} catch(\InvalidArgumentException | \Exception | \TypeError $exception) {
				$exceptionType = get_class($exception);
				throw(new $exceptionType($exception->getMessage(), 0, $exception));
			}
		}

	public function getIsGettingAwayVerySlowly() : bool {
			return($this->getIsGettingAwayVerySlowly);
		}

		public function setIsGettingAwayVerySlowly($newIsGettingAwayVerySlowly) : void {
			$newIsGettingAwayVerySlowly = vilter_var($newIsGettingAwayVerySlowly, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);

			if($newIsGettingAwayVerySlowly === null) {
				throw (new InvalidArgumentException("unable to determine if he's getting away"));
		}
		$this->isGettingAwayVerySlowly  = $newIsGettingAwayVerySlowly;
}














	private function carOrTruck ($vehicle) {
		echo ($vehicle ." is a car or truck");
		$vehicle::Brake;
	}

	private function buggyOrFloat ($vehicle) {
		echo ($vehicle . " is a slow mode of transport...");
	}
};



class Tesla extends Vehicle {

	private function crazyCar ($vehicle) {
		echo($vehicle . " is a fancy and expensive brand of car.....hope it's worth it!");
	}
}


class Horse extends Vehicle {
	private function thisIsAHorse ($vehicle) {
		echo("A " .$vehicle . " is fun to ride, but not very good on modern streets");
	}
}


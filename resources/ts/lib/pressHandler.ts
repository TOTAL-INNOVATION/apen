class PressHandler {

	static timerValue: number = 0;
	static timerId: NodeJS.Timeout|null = null;
	static timerInterval: number = 90;

	static onPressIn(callback: (timerValue: number) => void) {
		this.timerId = setInterval(() => {
			this.timerValue++;
			callback(this.timerValue);
		}, this.timerInterval);
	}

	static onPressOut(callback?: (timerValue: number) => void) {
		if (this.timerId)
			clearInterval(this.timerId);

		if (callback)
			callback(this.timerValue);
	}

}

export default PressHandler;

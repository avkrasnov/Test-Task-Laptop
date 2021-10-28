class ComplexNumber {
	
	constructor(real, imaginary = 0) {
		this.real = real;
		this.imaginary = imaginary;
	}
	
	add(real, imaginary = 0) {
		const c = ComplexNumber.toComplex(real, imaginary);
		return new ComplexNumber(this.real + c.real, this.imaginary + c.imaginary);
	}
	
	subtract(real, imaginary = 0) {
		const c = ComplexNumber.toComplex(real, imaginary);
		return new ComplexNumber(this.real - c.real, this.imaginary - c.imaginary);
	}
	
	multiply(real, imaginary = 0) {
		const c = ComplexNumber.toComplex(real, imaginary);
		const [x1, y1, x2, y2] = [this.real, this.imaginary, c.real, c.imaginary];
		return new ComplexNumber(x1 * x2 - y1 * y2, x1 * y2 + y1 * x2);
	}
	
	divide(real, imaginary = 0) {
		const c = ComplexNumber.toComplex(real, imaginary);
		const [x1, y1, x2, y2] = [this.real, this.imaginary, c.real, c.imaginary];
		const denominator = x2 * x2 + y2 * y2;
		if (denominator == 0) return new ComplexNumber(Infinity, 0);
		return new ComplexNumber((x1 * x2 + y1 * y2) / denominator, (y1 * x2 - x1 * y2) / denominator);
	}
	
	static toComplex(real, imaginary = 0) {
		if (real instanceof ComplexNumber) return real;
		return new ComplexNumber(real, imaginary);
	}
	
	toString() {
		if (this.imaginary == 0) return this.real.toString();
		return `${this.real} ${this.imaginary > 0 ? '+' : '-'} ${Math.abs(this.imaginary)}i`;
	}
	
	get real() {
		return this._real;
	}
	
	set real(val) {
		this._real = +val || 0;
	}
	
	get imaginary() {
		return this._imaginary;
	}
	
	set imaginary(val) {
		this._imaginary = +val || 0;
	}
	
}
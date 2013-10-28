def sumSquare(length)
	sumOfSquares = 0
	squareOfSums = 0
	(1..length).each do |x|
		sumOfSquares = (x * x) + sumOfSquares
		squareOfSums = squareOfSums + x
	end
	squareOfSums = squareOfSums * squareOfSums
	total = squareOfSums - sumOfSquares
	return total
end

puts sumSquare(100)
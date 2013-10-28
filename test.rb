def fib(n)
	gRatio = 1.61803398875

	if n == 0
		return 0
	elsif n == 1
		return 1
	else
		num = (((gRatio)**n) - ((1 - gRatio) ** n)) / Math.sqrt(5)
		return num.to_i
	end
end

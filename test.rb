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

def subSearch(str)
	cArr = str.split(",") # comparison array
	a = cArr[0];
	b = cArr[1]
	b = b.split("")
	b.each_with_index do |x,i|
		if x == "*" then
			b[i] = ".*"
		end
	end
	b = b.join("")
	if a.scan(/#{b}/).length > 0 then
		puts true
	else
		puts false
	end
end

def pokerHands(hands)

end

def matrixAddition(a, b)
  nArr = []
  a.each_with_index do (x,i)
    nArr[i] = a[i] + b[i]
  end
  return nArr
end

puts matrixAddition([[1, 2], [1, 2]], [[2, 3], [2, 3]])
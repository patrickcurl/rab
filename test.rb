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
def matrixAddition(a, b)

  a.each_with_index do (x)
    nArr[i] = x[i] + b[i]
  end
  return nArr
end

def pokerHands(h)
	hand = []
	hands = h.split(" ")
	hands.each_with_index do |x,i|
		c  = x.split("")
		case c[1]
			when "D"
				c[1] = "Diamonds"
			when "C"
				c[1] = "Clubs"
			when "H"
				c[1] = "Hearts"
			when "S"
				c[1] = "Spades"
		end
		hand[i] = {c[1] => c[0]}

	end
	return hand
end
print pokerHands("6D 7H AH 7S QC 6H 2D TD JD AS")

def rFlush(h)

end

def sFlush(h)
end

def fKind(h)
end

def fHouse(h)
end

def flush(h)
end

def straight(h)
end

def tKind(h)
end

def tPairs(h)
end

def oPair(h)
end

def highCard(h)
end









class User

  def initialize(rank=-8, progress=0)
      @rank = rank
      @progress = progress
  end
  def rank(num=0)
    return @rank
  end
  def progress(num=0)
    @progress += num
    if(@rank == 8) then
      @progress = 0
    else
        while (@progress >= 100) do
          @rank += 1
          if (@rank == 0) then
            @rank += 1
          end
          @progress -= 100
        end
    end
    return @progress
  end
  def inc_progress(aRank)
    if(aRank > 8 || aRank < -8 || aRank ==0) then
      raise "Error!"
    end
    if(aRank > 0 && @rank <0) then
        d = aRank - @rank - 1
    else
        d = aRank - @rank
    end

    if (aRank == @rank - 1)  then
      self.progress(1)
    elsif (@rank == 1 && aRank == -1) then
      self.progress(1)
    elsif(aRank == @rank) then
        self.progress(3)
    elsif (aRank > @rank) then
    self.progress(10 * d * d)
    end

  end
end
u = User.new
u.inc_progress(3)

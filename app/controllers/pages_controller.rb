class PagesController < ApplicationController
  def home

    storageState = %x(df -k | grep -vE '^Filesystem|tmpfs|devtmpfs|/dev/mmcblk0p1' | awk '{ print $5 }' | sed -e "s/%//g" | tr '\n' ' ').to_i

    if  storageState < 5
      @img = "/assets/sd_card-0.png"
    elsif storageState < 15
      @img = "/assets/sd_card-10.png"
    elsif storageState < 25
      @img = "/assets/sd_card-20.png"
    elsif storageState < 35
      @img = "/assets/sd_card-30.png"
    elsif storageState < 45
      @img = "/assets/sd_card-40.png"
    elsif storageState < 55
      @img = "/assets/sd_card-50.png"
    elsif storageState < 65
      @img = "/assets/sd_card-60.png"
    elsif storageState < 75
      @img = "/assets/sd_card-70.png"
    elsif storageState < 85
      @img = "/assets/sd_card-80.png"
    elsif storageState < 95
      @img = "/assets/sd_card-90.png"
    else
      @img = "/assets/sd_card-100.png"
    end
  end

  def download
    send_file(params[:path])
  end
end

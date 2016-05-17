class PagesController < ApplicationController
  def home
  end

  def download
    send_file(params[:path])
  end
end

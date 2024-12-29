import React from 'react';
import ReactMarkdown from 'react-markdown';
import { Message } from '../types/chat';
import clsx from 'clsx';

interface ChatMessageProps {
  message: Message;
}

export const ChatMessage: React.FC<ChatMessageProps> = ({ message }) => {
  const isUser = message.role === 'user';
  
  return (
    <div
      className={clsx(
        'py-4 px-6 max-w-3xl mx-auto',
        isUser ? 'bg-white' : 'bg-gray-50'
      )}
    >
      <div className="flex gap-4">
        <div className={clsx(
          'w-8 h-8 rounded-full flex items-center justify-center',
          isUser ? 'bg-blue-500' : 'bg-green-500'
        )}>
          <span className="text-white text-sm">
            {isUser ? 'U' : 'A'}
          </span>
        </div>
        <div className="flex-1">
          <ReactMarkdown className="prose">
            {message.content}
          </ReactMarkdown>
        </div>
      </div>
    </div>
  );
};
#!/bin/bash

# Set variables
SOURCE_DIR="src"
BUILD_DIR="build"
OUTPUT_FILE="output"

# Create build directory if it doesn't exist
mkdir -p $BUILD_DIR

# Compile source files
for file in $SOURCE_DIR/*.c; do
    gcc -c $file -o $BUILD_DIR/$(basename $file .c).o
done

# Link object files
gcc $BUILD_DIR/*.o -o $BUILD_DIR/$OUTPUT_FILE

# Clean up object files
rm $BUILD_DIR/*.o

echo "Build complete. Executable is located at $BUILD_DIR/$OUTPUT_FILE"